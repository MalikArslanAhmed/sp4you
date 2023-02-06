@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.crmCustomer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crm-customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.id') }}
                        </th>
                        <td>
                            {{ $crmCustomer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.first_name') }}
                        </th>
                        <td>
                            {{ $crmCustomer->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.last_name') }}
                        </th>
                        <td>
                            {{ $crmCustomer->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.email') }}
                        </th>
                        <td>
                            {{ $crmCustomer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.phone') }}
                        </th>
                        <td>
                            {{ $crmCustomer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.phone_2') }}
                        </th>
                        <td>
                            {{ $crmCustomer->phone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.address') }}
                        </th>
                        <td>
                            {{ $crmCustomer->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.postcode') }}
                        </th>
                        <td>
                            {{ $crmCustomer->postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.city') }}
                        </th>
                        <td>
                            {{ $crmCustomer->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.state') }}
                        </th>
                        <td>
                            {{ $crmCustomer->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.status') }}
                        </th>
                        <td>
                            {{ $crmCustomer->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.tags') }}
                        </th>
                        <td>
                            @foreach($crmCustomer->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->tags }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crm-customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#customer_crm_notes" role="tab" data-toggle="tab">
                {{ trans('cruds.crmNote.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_crm_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.crmDocument.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#client_photos" role="tab" data-toggle="tab">
                {{ trans('cruds.photo.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#client_expenses" role="tab" data-toggle="tab">
                {{ trans('cruds.expense.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#clients_appointments" role="tab" data-toggle="tab">
                {{ trans('cruds.appointment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#clients_invoices" role="tab" data-toggle="tab">
                {{ trans('cruds.invoice.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="customer_crm_notes">
            @includeIf('admin.crmCustomers.relationships.customerCrmNotes', ['crmNotes' => $crmCustomer->customerCrmNotes])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_crm_documents">
            @includeIf('admin.crmCustomers.relationships.customerCrmDocuments', ['crmDocuments' => $crmCustomer->customerCrmDocuments])
        </div>
        <div class="tab-pane" role="tabpanel" id="client_photos">
            @includeIf('admin.crmCustomers.relationships.clientPhotos', ['photos' => $crmCustomer->clientPhotos])
        </div>
        <div class="tab-pane" role="tabpanel" id="client_expenses">
            @includeIf('admin.crmCustomers.relationships.clientExpenses', ['expenses' => $crmCustomer->clientExpenses])
        </div>
        <div class="tab-pane" role="tabpanel" id="clients_appointments">
            @includeIf('admin.crmCustomers.relationships.clientsAppointments', ['appointments' => $crmCustomer->clientsAppointments])
        </div>
        <div class="tab-pane" role="tabpanel" id="clients_invoices">
            @includeIf('admin.crmCustomers.relationships.clientsInvoices', ['invoices' => $crmCustomer->clientsInvoices])
        </div>
    </div>
</div>

@endsection