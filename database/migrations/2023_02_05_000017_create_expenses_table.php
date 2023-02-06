<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('decscription')->nullable();
            $table->decimal('ammount', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
