<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpensesTable extends Migration
{
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_7872131')->references('id')->on('crm_customers');
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->foreign('appointment_id', 'appointment_fk_7872132')->references('id')->on('appointments');
            $table->unsignedBigInteger('invoice_number_id')->nullable();
            $table->foreign('invoice_number_id', 'invoice_number_fk_7950041')->references('id')->on('invoices');
        });
    }
}
