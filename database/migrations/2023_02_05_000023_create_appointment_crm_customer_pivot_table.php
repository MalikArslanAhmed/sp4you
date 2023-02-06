<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentCrmCustomerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_crm_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_id');
            $table->foreign('appointment_id', 'appointment_id_fk_7872064')->references('id')->on('appointments')->onDelete('cascade');
            $table->unsignedBigInteger('crm_customer_id');
            $table->foreign('crm_customer_id', 'crm_customer_id_fk_7872064')->references('id')->on('crm_customers')->onDelete('cascade');
        });
    }
}
