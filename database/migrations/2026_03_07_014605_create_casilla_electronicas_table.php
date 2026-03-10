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
        Schema::create('casilla_electronicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mailbox_number')->unique();
            $table->foreignId('tipo_casilla_id')->constrained('tipo_casillas')->onDelete('cascade');
            $table->string('status')->default('pendiente');
            $table->foreignId('user_created_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('activated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casilla_electronicas');
    }
};
