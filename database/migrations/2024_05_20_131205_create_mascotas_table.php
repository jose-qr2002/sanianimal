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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('sexo', ['Macho','Hembra','Indefinido']);
            $table->string('color')->nullable();
            $table->boolean('pedigree');
            $table->foreignId('cliente_id')->constrained()->onDelete('no action');
            $table->foreignId('especie_id')->constrained()->onDelete('no action');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('raza')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
