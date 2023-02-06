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
            $table->longText('user_notes')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->longText('admin_notes')->nullable();
            $table->boolean('editable')->default(1)->nullable();
            $table->boolean('deleteable')->default(1)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
