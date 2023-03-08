<?php

namespace App\Http\Controllers\Admin;

use App\Events\AppointmentDelete;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\AppoimntmentStatus;
use App\Models\Appointment;
use App\Models\CrmCustomer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\LeaveApplication;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use App\Models\StaffAvailability;
use DateTime;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointments = Appointment::with(['clients', 'assigned_staffs', 'status', 'media'])->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id');

        $assigned_staffs = User::pluck('name', 'id');

        $statuses = AppoimntmentStatus::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appointments.create', compact('assigned_staffs', 'clients', 'statuses'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->availibilityCheck($request->all());
            $appointment = Appointment::create($request->all());
            if ($appointment['status_id'] == 2) {
                $this->makeBills($appointment['id'], $request->all());
            }
            $appointment->clients()->sync($request->input('clients', []));
            $appointment->assigned_staffs()->sync($request->input('assigned_staffs', []));
            foreach ($request->input('photos', []) as $file) {
                $appointment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }

            foreach ($request->input('documents', []) as $file) {
                $appointment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }

            if ($media = $request->input('ck-media', false)) {
                Media::whereIn('id', $media)->update(['model_id' => $appointment->id]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return redirect()->route('admin.appointments.index');
    }

    public function edit(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id');

        $assigned_staffs = User::pluck('name', 'id');

        $statuses = AppoimntmentStatus::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointment->load('clients', 'assigned_staffs', 'status');

        return view('admin.appointments.edit', compact('appointment', 'assigned_staffs', 'clients', 'statuses'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        try {
            DB::beginTransaction();
            $this->availibilityCheck($request->all());
            if ($request->all()['status_id'] == 2) {
                $this->makeBills($appointment['id'], $request->all());
            }
            $appointment->update($request->all());
            $appointment->clients()->sync($request->input('clients', []));
            $appointment->assigned_staffs()->sync($request->input('assigned_staffs', []));
            if (count($appointment->photos) > 0) {
                foreach ($appointment->photos as $media) {
                    if (!in_array($media->file_name, $request->input('photos', []))) {
                        $media->delete();
                    }
                }
            }
            $media = $appointment->photos->pluck('file_name')->toArray();
            foreach ($request->input('photos', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $appointment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
                }
            }

            if (count($appointment->documents) > 0) {
                foreach ($appointment->documents as $media) {
                    if (!in_array($media->file_name, $request->input('documents', []))) {
                        $media->delete();
                    }
                }
            }
            $media = $appointment->documents->pluck('file_name')->toArray();
            foreach ($request->input('documents', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $appointment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return redirect()->route('admin.appointments.index');
    }

    public function show(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->load('clients', 'assigned_staffs', 'status', 'appointmentPhotos', 'appointmentExpenses');
        // dd('gh');
        return view('admin.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AppointmentDelete::dispatch($appointment);
        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        Appointment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('appointment_create') && Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Appointment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function availibilityCheck($data)
    {
        $assigned_staffs = $data['assigned_staffs'];
        if (!Carbon::createFromFormat('d/m/Y', explode(' ', $data['start_time'])[0])->eq(Carbon::createFromFormat('d/m/Y', explode(' ', $data['end_time'])[0]))) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'start_time' => ['Start Date Should be same as End Date'],
                'end_time' => ['End Date should be same as Start Date'],
            ]);
            throw $error;
        }
        if (Carbon::createFromFormat('d/m/Y H:i:s', $data['start_time'])->gte(Carbon::createFromFormat('d/m/Y H:i:s', $data['end_time']))) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'start_time' => ['Start Time Should be smaller then End Time'],
                'end_time' => ['End Time should be greater then Start Time'],
            ]);
            throw $error;
        }
        if (isset($data['check_in']) && isset($data['check_out'])) {
            if (Carbon::createFromFormat('d/m/Y H:i:s', $data['check_in'])->lt(Carbon::createFromFormat('d/m/Y H:i:s', $data['start_time']))) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'check_in' => ['Check-in cant be less then Start Time'],
                ]);
                throw $error;
            }


            if (Carbon::createFromFormat('d/m/Y H:i:s', $data['check_in'])->gte(Carbon::createFromFormat('d/m/Y H:i:s', $data['check_out']))) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'check_in' => ['Check-in should be smaller then Check-out'],
                    'check_out' => ['Check-out should be greater then Check-in'],
                ]);
                throw $error;
            }
        }
        $start_date_errors = [];
        $start_time_errors = [];
        $end_date_errors = [];
        $end_time_errors = [];
        foreach ($assigned_staffs as $staff) {
            $user = User::where('id', $staff)->first();
            //Check If staff is on leave
            $user_leaves = LeaveApplication::where([
                ['staff_member_id', $staff],
                ['approved', 1]
            ])
                ->get();
            $staff_availibility = StaffAvailability::where([
                ['staff_member_id', $staff]
            ])
                ->get();
            foreach ($user_leaves as $leave) {
                $start_leave_date = Carbon::createFromFormat('d/m/Y', $leave['leave_start']);
                $end_leave_date = Carbon::createFromFormat('d/m/Y', $leave['leave_ends']);
                $start_appointment_date = Carbon::createFromFormat('d/m/Y', explode(' ', $data['start_time'])[0]);
                $end_appointment_date = Carbon::createFromFormat('d/m/Y',  explode(' ', $data['end_time'])[0]);
                if ($start_appointment_date->gte($start_leave_date)  && $start_appointment_date->lte($end_leave_date)) {
                    array_push($start_date_errors, "\"" . $user['name'] . "\"");
                }
                if ($end_appointment_date->gte($start_leave_date) && $end_appointment_date->lte($end_leave_date)) {
                    array_push($end_date_errors, "\"" . $user['name'] . "\"");
                }
            }
            //leaves check ends

            //Check if staff is available on mentioned time
            $day =  strtolower(Carbon::createFromFormat('d/m/Y', explode(' ', $data['start_time'])[0])->format('l'));
            $is_available_start_time = false;
            $is_available_end_time = false;
            foreach ($staff_availibility as $availibility) {
                //Check start time
                if (
                    (isset($availibility[$day . '_from']) && $availibility[$day . '_to']) &&
                    Carbon::createFromFormat('H:i:s', explode(' ', $data['start_time'])[1])->gte(Carbon::createFromFormat('H:i:s', $availibility[$day . '_from']))
                    &&
                    Carbon::createFromFormat('H:i:s', explode(' ', $data['start_time'])[1])->lte(Carbon::createFromFormat('H:i:s', $availibility[$day . '_to']))
                ) {
                    $is_available_start_time = true;
                }
                //Check end time
                if (
                    (isset($availibility[$day . '_from']) && $availibility[$day . '_to']) &&
                    Carbon::createFromFormat('H:i:s', explode(' ', $data['start_time'])[1])->gte(Carbon::createFromFormat('H:i:s', $availibility[$day . '_from']))
                    &&
                    Carbon::createFromFormat('H:i:s', explode(' ', $data['end_time'])[1])->lte(Carbon::createFromFormat('H:i:s', $availibility[$day . '_to']))
                ) {
                    $is_available_end_time = true;
                }
            }

            if (!$is_available_start_time) {
                array_push($start_time_errors, "\"" . $user['name'] . "\"");
            }
            if (!$is_available_end_time) {
                array_push($end_time_errors, "\"" . $user['name'] . "\"");
            }
        }
        if (count($start_date_errors)) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'start_time' => ['Staff ' . join(', ', $start_date_errors) . ' is not available on selected appointed Start Date'],
            ]);
            throw $error;
        }
        if (count($end_date_errors)) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'end_time' => ['Staff ' . join(', ', $end_date_errors) . ' is not available on selected appointed End Date']
            ]);
            throw $error;
        }
        if (count($start_time_errors)) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'start_time' => ['Staff ' . join(', ', $start_time_errors) . ' is not available on selected Start Time']
            ]);
            throw $error;
        }
        if (count($end_time_errors)) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'end_time' => ['Staff ' . join(', ', $end_time_errors) . ' is not available on selected End Time']
            ]);
            throw $error;
        }
    }

    public function makeBills($id, $appointment)
    {
        $start_time = Carbon::createFromFormat('d/m/Y H:i:s', $appointment['start_time']);
        $end_time = Carbon::createFromFormat('d/m/Y H:i:s', $appointment['end_time']);

        $amount = 0;
        $day = $start_time->format('l');
        $evening_time = Carbon::createFromFormat('d/m/Y H:i:s', $end_time->format('d/m/Y') . ' 17:00:00');
        if ($day == 'Saturday' || $day == 'Sunday') {
            $amount = 70;
        } else {
            if ($start_time->lt($evening_time)) {
                $amount = 40;
            } else {
                $amount = 65;
            }
        }
        foreach ($appointment['clients'] as $client) {
            $bill_data = [
                'total_amount' => ($amount * $start_time->diffInHours($end_time)) * (count($appointment['assigned_staffs']) / count($appointment['clients'])),
                'total_hours_consumed' => $start_time->diffInHours($end_time),
                'hour_charges' => $amount,
                'description' => $appointment['notes'],
                'status' => 'in-progress',
                'appointment_id' => $id,
                'client_id' => $client,
                'expense_id' => null,
            ];
            $invoice = Invoice::create($bill_data);
            foreach ($appointment['assigned_staffs'] as $staff) {
                $invoice_details_data = [
                    'invoice_id' => $invoice['id'],
                    'user_id' => $staff,
                ];
                InvoiceDetail::create($invoice_details_data);
            }
        }
    }
}
