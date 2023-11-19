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
        Schema::create('abonement_visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rating');
            $table->dateTime('datetime_visited');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonement_visitors');
    }
};
