<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLeaveApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('leave_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_member_id')->nullable();
            $table->foreign('staff_member_id', 'staff_member_fk_7872103')->references('id')->on('users');
        });
    }
}
