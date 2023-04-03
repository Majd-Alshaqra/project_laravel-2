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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('message');
            $table->string('Your_student_number', 20);
            $table->string('name_student', 45);
            $table->string('email', 45);
            $table->string('image')->nullable();
            $table->enum('type', ['complaints', 'Suggestion']);
            $table->enum('status', ['Open', 'Closed'])->default('Open');
            $table->boolean('urgent')->default(false);
            $table->timestamps();
            $table->text('response')->nullable();
            $table->string('closed_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
