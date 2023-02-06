<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStaffAvailabilitiesTable extends Migration
{
    public function up()
    {
        Schema::table('staff_availabilities', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_member_id')->nullable();
            $table->foreign('staff_member_id', 'staff_member_fk_7949556')->references('id')->on('users');
        });
    }
}
