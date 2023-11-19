<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->integer('age');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->foreignId('role_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
