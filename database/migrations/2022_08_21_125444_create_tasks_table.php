<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->tinytext('title');
            $table->text('description');
            $table->foreignId('subject_id')->constrained();
            $table->boolean('completed')->default(false);
            $table->timestamp('due_at');
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->tinytext('file_name')->nullable();
            $table->text('url');
            $table->foreignId('owner_id')->references('id')->on('users')->constrained();
            $table->timestamps();
        });

        Schema::create('file_task_pivots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained();
            $table->foreignId('file_id')->constrained();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('subjects');
    }
};
