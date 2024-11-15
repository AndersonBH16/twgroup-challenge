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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('number')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('capacity');
            $table->enum('state', ['disponible', 'ocupado', 'reservado', 'mantenimiento', 'pendiente'])->default('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
