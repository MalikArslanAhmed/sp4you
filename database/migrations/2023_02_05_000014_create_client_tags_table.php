<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTagsTable extends Migration
{
    public function up()
    {
        Schema::create('client_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tags')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
