<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('status', ['todo', 'in progress', 'done']);
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Permet de rendre user_id optionnel
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
