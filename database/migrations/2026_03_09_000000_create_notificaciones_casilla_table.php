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
        Schema::create('notificaciones_casilla', function (Blueprint $table) {
            $table->id();
            $table->foreignId('casilla_electronica_id')->constrained('casilla_electronicas')->onDelete('cascade');
            $table->foreignId('expediente_id')->nullable()->constrained('expedientes')->onDelete('set null');
            $table->string('numero_notificacion')->unique();
            $table->string('asunto');
            $table->text('mensaje')->nullable();
            $table->string('tipo')->comment('Resolución, Decreto, Requerimiento, etc.');
            $table->string('documento_path')->nullable();
            $table->timestamp('leido_at')->nullable();
            $table->foreignId('user_created_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones_casilla');
    }
};
