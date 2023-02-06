<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('notes')->nullable();
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->datetime('check_in')->nullable();
            $table->datetime('check_out')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('state')->nullable();
            $table->integer('billing_run')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
