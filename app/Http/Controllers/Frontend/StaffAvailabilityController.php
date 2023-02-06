<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStaffAvailabilityRequest;
use App\Http\Requests\StoreStaffAvailabilityRequest;
use App\Http\Requests\UpdateStaffAvailabilityRequest;
use App\Models\StaffAvailability;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffAvailabilityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_availability_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffAvailabilities = StaffAvailability::with(['staff_member'])->get();

        return view('frontend.staffAvailabilities.index', compact('staffAvailabilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('staff_availability_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff_members = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.staffAvailabilities.create', compact('staff_members'));
    }

    public function store(StoreStaffAvailabilityRequest $request)
    {
        $staffAvailability = StaffAvailability::create($request->all());

        return redirect()->route('frontend.staff-availabilities.index');
    }

    public function edit(StaffAvailability $staffAvailability)
    {
        abort_if(Gate::denies('staff_availability_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff_members = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $staffAvailability->load('staff_member');

        return view('frontend.staffAvailabilities.edit', compact('staffAvailability', 'staff_members'));
    }

    public function update(UpdateStaffAvailabilityRequest $request, StaffAvailability $staffAvailability)
    {
        $staffAvailability->update($request->all());

        return redirect()->route('frontend.staff-availabilities.index');
    }

    public function show(StaffAvailability $staffAvailability)
    {
        abort_if(Gate::denies('staff_availability_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffAvailability->load('staff_member');

        return view('frontend.staffAvailabilities.show', compact('staffAvailability'));
    }

    public function destroy(StaffAvailability $staffAvailability)
    {
        abort_if(Gate::denies('staff_availability_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffAvailability->delete();

        return back();
    }

    public function massDestroy(MassDestroyStaffAvailabilityRequest $request)
    {
        StaffAvailability::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
