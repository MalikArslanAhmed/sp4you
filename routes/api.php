<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Crm Note
    Route::apiResource('crm-notes', 'CrmNoteApiController');

    // Appointment
    Route::post('appointments/media', 'AppointmentApiController@storeMedia')->name('appointments.storeMedia');
    Route::apiResource('appointments', 'AppointmentApiController');
});
