<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAvailabilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('staff_availabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('monday')->nullable();
            $table->time('tuesday')->nullable();
            $table->time('wednesday')->nullable();
            $table->time('thursday')->nullable();
            $table->time('friday')->nullable();
            $table->time('saturday')->nullable();
            $table->time('sunday')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
