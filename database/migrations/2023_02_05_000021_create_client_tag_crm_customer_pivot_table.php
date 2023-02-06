<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTagCrmCustomerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('client_tag_crm_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('crm_customer_id');
            $table->foreign('crm_customer_id', 'crm_customer_id_fk_7872094')->references('id')->on('crm_customers')->onDelete('cascade');
            $table->unsignedBigInteger('client_tag_id');
            $table->foreign('client_tag_id', 'client_tag_id_fk_7872094')->references('id')->on('client_tags')->onDelete('cascade');
        });
    }
}
