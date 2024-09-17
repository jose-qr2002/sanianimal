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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('sex', ['Macho','Hembra','Indefinido']);
            $table->string('color')->nullable();
            $table->boolean('pedigree');
            $table->foreignId('customer_id')->constrained()->onDelete('no action');
            $table->foreignId('specie_id')->constrained()->onDelete('no action');
            $table->date('birthdate')->nullable();
            $table->string('race')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
