<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifyrepaircomputerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notify_repair_computer', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('user_repair');
            $table->string('code_computer');
            $table->string('room');
            $table->string('row');
            $table->string('position');
            $table->string('data_repair');
            $table->string('data_finish')->nullable();
            $table->string('cause');
            $table->string('note')->nullable();
            $table->string('name_repair')->nullable();
            $table->string('status')->nullable();
            $table->foreign('email')->references('email')->on('users')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifyrepaircomputer');
    }
}
