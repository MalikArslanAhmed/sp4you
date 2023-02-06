<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentInvoicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_invoice', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_7950034')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('appointment_id');
            $table->foreign('appointment_id', 'appointment_id_fk_7950034')->references('id')->on('appointments')->onDelete('cascade');
        });
    }
}
