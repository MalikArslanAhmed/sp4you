<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmCustomerInvoicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('crm_customer_invoice', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_7950033')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('crm_customer_id');
            $table->foreign('crm_customer_id', 'crm_customer_id_fk_7950033')->references('id')->on('crm_customers')->onDelete('cascade');
        });
    }
}
