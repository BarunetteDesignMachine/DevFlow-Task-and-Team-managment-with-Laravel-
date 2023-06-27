<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            $table->enum('status', ['assigned', 'in progress', 'completed'])->nullable();
            $table->integer('assigned_to')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('group_id')->nullable();
            $table->date('finished_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
