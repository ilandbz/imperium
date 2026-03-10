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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->integer('ano');
            $table->string('titulo');
            $table->string('materia')->nullable();
            $table->string('demandante')->nullable();
            $table->string('demandado')->nullable();
            $table->decimal('cuantia', 15, 2)->default(0);
            $table->enum('estado', ['tramite', 'archivado', 'resuelto'])->default('tramite');
            $table->foreignId('user_created_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
