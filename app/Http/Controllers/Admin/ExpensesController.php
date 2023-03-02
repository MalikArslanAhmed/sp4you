<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExpenseRequest;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Appointment;
use App\Models\CrmCustomer;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Bill;
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

        $expenses = Expense::with(['client', 'appointment', 'bill', 'media'])->get();

        return view('admin.expenses.index', compact('expenses'));
    }

    public function create()
    {
        abort_if(Gate::denies('expense_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointments = Appointment::pluck('start_time', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bills = Invoice::pluck('bill', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expenses.create', compact('appointments', 'clients', 'bills'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $data = $request->all();
        $expense = Expense::create($data);
        $appointment = Appointment::where('id', $expense->appointment_id)
            ->with(['clients', 'assigned_staffs', 'status', 'media'])
            ->first();
        $this->makeBills($expense, $appointment);
        if ($request->input('receipt_photo', false)) {
            $expense->addMedia(storage_path('tmp/uploads/' . basename($request->input('receipt_photo'))))->toMediaCollection('receipt_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $expense->id]);
        }

        return redirect()->route('admin.expenses.index');
    }

    public function edit(Expense $expense)
    {
        abort_if(Gate::denies('expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointments = Appointment::pluck('start_time', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bills = Invoice::pluck('bill', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expense->load('client', 'appointment', 'bill');

        return view('admin.expenses.edit', compact('appointments', 'clients', 'expense', 'bills'));
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

        return redirect()->route('admin.expenses.index');
    }

    public function show(Expense $expense)
    {
        abort_if(Gate::denies('expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->load('client', 'appointment', 'bill');

        return view('admin.expenses.show', compact('expense'));
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

    public function makeBills($expense, $appointment)
    {
        $start_time = Carbon::parse($appointment['start_time']);
        $end_time = Carbon::parse($appointment['end_time']);
        foreach ($appointment['assigned_staffs'] as $staff) {
            $bill_data = [
                'amount' => ($expense['ammount']) * $start_time->diffInHours($end_time),
                'date' => $expense['date'],
                'description' => $expense['decscription'],
                'status' => 'in-progress',
                'client_id' => $expense['client_id'],
                'user_id' => $staff['id'],
                'expense_id' => $expense['id'],
            ];
            if ($expense['group_expense']) {
                $bill_data['amount'] = ($expense['ammount'] / count($appointment['clients'])) * $start_time->diffInHours($end_time);
            }
            Bill::create($bill_data);
        }
    }
}
