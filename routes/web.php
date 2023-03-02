<?php

use Dcblogdev\Xero\Facades\Xero;

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Appointment
    Route::delete('appointments/destroy', 'AppointmentController@massDestroy')->name('appointments.massDestroy');
    Route::post('appointments/media', 'AppointmentController@storeMedia')->name('appointments.storeMedia');
    Route::post('appointments/ckmedia', 'AppointmentController@storeCKEditorImages')->name('appointments.storeCKEditorImages');
    Route::resource('appointments', 'AppointmentController');

    // Photos
    Route::delete('photos/destroy', 'PhotosController@massDestroy')->name('photos.massDestroy');
    Route::post('photos/media', 'PhotosController@storeMedia')->name('photos.storeMedia');
    Route::post('photos/ckmedia', 'PhotosController@storeCKEditorImages')->name('photos.storeCKEditorImages');
    Route::resource('photos', 'PhotosController');

    // Appoimntment Status
    Route::delete('appoimntment-statuses/destroy', 'AppoimntmentStatusController@massDestroy')->name('appoimntment-statuses.massDestroy');
    Route::resource('appoimntment-statuses', 'AppoimntmentStatusController');

    // Client Tags
    Route::delete('client-tags/destroy', 'ClientTagsController@massDestroy')->name('client-tags.massDestroy');
    Route::resource('client-tags', 'ClientTagsController');

    // Leave Application
    Route::delete('leave-applications/destroy', 'LeaveApplicationController@massDestroy')->name('leave-applications.massDestroy');
    Route::resource('leave-applications', 'LeaveApplicationController');

    // Staff Availability
    Route::delete('staff-availabilities/destroy', 'StaffAvailabilityController@massDestroy')->name('staff-availabilities.massDestroy');
    Route::resource('staff-availabilities', 'StaffAvailabilityController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpensesController@massDestroy')->name('expenses.massDestroy');
    Route::post('expenses/media', 'ExpensesController@storeMedia')->name('expenses.storeMedia');
    Route::post('expenses/ckmedia', 'ExpensesController@storeCKEditorImages')->name('expenses.storeCKEditorImages');
    Route::resource('expenses', 'ExpensesController');

    // Billing Run
    Route::delete('billing-runs/destroy', 'BillingRunController@massDestroy')->name('billing-runs.massDestroy');
    Route::put('billing-runs/generat-invoice/{id}', 'BillingRunController@generateInvoice')->name('billing-runs.generateInvoice');
    Route::resource('billing-runs', 'BillingRunController');

    // Leave Approval
    Route::delete('leave-approvals/destroy', 'LeaveApprovalController@massDestroy')->name('leave-approvals.massDestroy');
    Route::get('leave-approvals', 'LeaveApprovalController@index')->name('leave-approvals.index');
    Route::get('leave-approvals/{id}', 'LeaveApprovalController@show')->name('leave-approvals.show');
    Route::get('leave-approvals/edit/{id}', 'LeaveApprovalController@edit')->name('leave-approvals.edit');
    Route::put('leave-approvals/approved/{id}', 'LeaveApprovalController@approved')->name('leave-approvals.approved');
    Route::put('leave-approvals/update/{id}', 'LeaveApprovalController@update')->name('leave-approvals.update');

    // Invoices
    Route::put('invoices/generate-invoice/{id}', 'InvoicesController@generateInvoice')->name('invoices.generateInvoice');
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::resource('invoices', 'InvoicesController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');

    Route::get('xero', function () {

        if (!Xero::isConnected()) {
            return redirect('xero/connect');
        } else {
            //display your tenant name
            return Xero::getTenantName();
        }
    });

    Route::get('xero/connect', function () {
        return Xero::connect();
    });
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Appointment
    Route::delete('appointments/destroy', 'AppointmentController@massDestroy')->name('appointments.massDestroy');
    Route::post('appointments/media', 'AppointmentController@storeMedia')->name('appointments.storeMedia');
    Route::post('appointments/ckmedia', 'AppointmentController@storeCKEditorImages')->name('appointments.storeCKEditorImages');
    Route::resource('appointments', 'AppointmentController');

    // Photos
    Route::delete('photos/destroy', 'PhotosController@massDestroy')->name('photos.massDestroy');
    Route::post('photos/media', 'PhotosController@storeMedia')->name('photos.storeMedia');
    Route::post('photos/ckmedia', 'PhotosController@storeCKEditorImages')->name('photos.storeCKEditorImages');
    Route::resource('photos', 'PhotosController');

    // Appoimntment Status
    Route::delete('appoimntment-statuses/destroy', 'AppoimntmentStatusController@massDestroy')->name('appoimntment-statuses.massDestroy');
    Route::resource('appoimntment-statuses', 'AppoimntmentStatusController');

    // Client Tags
    Route::delete('client-tags/destroy', 'ClientTagsController@massDestroy')->name('client-tags.massDestroy');
    Route::resource('client-tags', 'ClientTagsController');

    // Leave Application
    Route::delete('leave-applications/destroy', 'LeaveApplicationController@massDestroy')->name('leave-applications.massDestroy');
    Route::resource('leave-applications', 'LeaveApplicationController');

    // Staff Availability
    Route::delete('staff-availabilities/destroy', 'StaffAvailabilityController@massDestroy')->name('staff-availabilities.massDestroy');
    Route::resource('staff-availabilities', 'StaffAvailabilityController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpensesController@massDestroy')->name('expenses.massDestroy');
    Route::post('expenses/media', 'ExpensesController@storeMedia')->name('expenses.storeMedia');
    Route::post('expenses/ckmedia', 'ExpensesController@storeCKEditorImages')->name('expenses.storeCKEditorImages');
    Route::resource('expenses', 'ExpensesController');

    // Billing Run
    Route::delete('billing-runs/destroy', 'BillingRunController@massDestroy')->name('billing-runs.massDestroy');
    Route::resource('billing-runs', 'BillingRunController');

    // Leave Approval
    Route::delete('leave-approvals/destroy', 'LeaveApprovalController@massDestroy')->name('leave-approvals.massDestroy');
    Route::resource('leave-approvals', 'LeaveApprovalController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::resource('invoices', 'InvoicesController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});

//xero routes
Route::group(['middleware' => ['web', 'XeroAuthenticated']], function () {
    Route::get('/xero', function () {
            return Xero::getTenantName();
    });
});
Route::get('xero/connect', function () {
    return Xero::connect();
});
