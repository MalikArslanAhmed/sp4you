<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_7872160')->references('id')->on('crm_customers');
            $table->unsignedBigInteger('expense_id')->nullable();
            $table->foreign('expense_id', 'expense_fk_7872162')->references('id')->on('expenses');
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->foreign('appointment_id', 'appointment_fk_7872169')->references('id')->on('appointments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
};
