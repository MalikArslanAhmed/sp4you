<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2)->nullable();
            $table->date('date');
            $table->string('description')->nullable();
            $table->string('xero_invoice_id')->nullable();
            $table->enum('status', ['in-progress','invoice-generated', 'approved'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
