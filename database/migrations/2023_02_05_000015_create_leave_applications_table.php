<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('leave_start');
            $table->date('leave_ends');
            $table->longText('notes')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
