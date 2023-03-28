<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExpenseRequest;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Appointment;
use App\Models\CrmCustomer;
use App\Models\Expense;
use App\Models\ExpenseDetail;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExpensesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenses = Expense::with(['expenseDetails', 'appointment',  'media'])->get();

        return view('staff.expenses.index', compact('expenses'));
    }

    public function create()
    {
        abort_if(Gate::denies('expense_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointments = Appointment::pluck('start_time', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('staff.expenses.create', compact('appointments', 'clients'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $data = $request->all();
        if ($data['group_expense'] == 0 && !isset($data['client_id'])) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'group_expense' => ['If client is not selected then group expense should mark as true']
            ]);
            throw $error;
        }
        $expense = Expense::create($data);
        // dd($expense);
        $appointment = Appointment::where('id', $expense->appointment_id)
            ->with(['clients', 'assigned_staffs', 'status', 'media'])
            ->first();
        $this->makeExpenseDetails($expense, $appointment, $data);
        $this->makeBills($expense, $appointment);
        if ($request->input('receipt_photo', false)) {
            $expense->addMedia(storage_path('tmp/uploads/' . basename($request->input('receipt_photo'))))->toMediaCollection('receipt_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $expense->id]);
        }

        return redirect()->route('staff.expenses.index');
    }
    public function makeExpenseDetails($expense, $appointment, $data)
    {
        $detailsData = [];
        if ($expense['group_expense'] == 1) {
            foreach ($appointment['clients'] as $client) {
                array_push($detailsData, [
                    'expense_id' => $expense['id'],
                    'client_id' => $client['id'],
                ]);
            }
            $expenseDetails =  ExpenseDetail::insert($detailsData);
        } else {
            $detailsData = [
                'expense_id' => $expense['id'],
                'client_id' => $data['client_id'],
            ];
            $expenseDetails =  ExpenseDetail::create($detailsData);
        }
    }
    public function makeBills($expense, $appointment)
    {
        // dd($expense);
        $expense_details_data = ExpenseDetail::where('expense_id', $expense['id'])->get();
        foreach ($expense_details_data  as $expenseDetails) {
            $bill_data = [
                'total_amount' => $expense['ammount'],
                'total_hours_consumed' => null,
                'hour_charges' => null,
                'description' => $expense['decscription'],
                'status' => 'in-progress',
                'appointment_id' => $expense['appointment_id'],
                'client_id' => $expenseDetails['client_id'],
                'expense_id' => $expense['id'],
            ];
            if ($expense['group_expense'] == 1) {
                $bill_data['total_amount'] = $expense['ammount'] / count($expense_details_data);
            }
            $invoice = Invoice::create($bill_data);
            foreach ($appointment['assigned_staffs'] as $staff) {
                $invoice_details_data = [
                    'invoice_id' => $invoice['id'],
                    'user_id' => $staff['id'],
                ];
                InvoiceDetail::create($invoice_details_data);
            }
        }
    }
    public function edit(Expense $expense)
    {
        abort_if(Gate::denies('expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointments = Appointment::pluck('start_time', 'id')->prepend(trans('global.pleaseSelect'), '');


        $expense->load('client', 'appointment');

        return view('staff.expenses.edit', compact('appointments', 'clients', 'expense'));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->all());

        if ($request->input('receipt_photo', false)) {
            if (!$expense->receipt_photo || $request->input('receipt_photo') !== $expense->receipt_photo->file_name) {
                if ($expense->receipt_photo) {
                    $expense->receipt_photo->delete();
                }
                $expense->addMedia(storage_path('tmp/uploads/' . basename($request->input('receipt_photo'))))->toMediaCollection('receipt_photo');
            }
        } elseif ($expense->receipt_photo) {
            $expense->receipt_photo->delete();
        }

        return redirect()->route('staff.expenses.index');
    }

    public function show(Expense $expense)
    {
        abort_if(Gate::denies('expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->load('expenseDetails', 'appointment',  'media');

        return view('staff.expenses.show', compact('expense'));
    }

    public function destroy(Expense $expense)
    {
        abort_if(Gate::denies('expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenseRequest $request)
    {
        Expense::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('expense_create') && Gate::denies('expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Expense();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
