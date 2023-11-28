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
        Schema::create('abonement_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('abonement_id')
                ->references('id')
                ->on('abonements')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('program_id')
                ->references('id')
                ->on('programs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonement_programs');
    }
};
