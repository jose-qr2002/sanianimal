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
        Schema::create('historias_clinicas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->unique();
            $table->text('motivo');
            $table->text('mucosas')->nullable();
            $table->text('anamnesis');
            $table->text('diagnostico');
            $table->text('tratamiento');
            $table->decimal('precio', 10,2);
            $table->foreignId('mascota_id')->constrained()->onDelete('NO ACTION');
            $table->foreignId('user_id')->constrained()->onDelete('NO ACTION');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historias_clinicas');
    }
};
