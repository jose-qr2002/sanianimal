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
        Schema::create('clinical_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->text('reason')->nullable();
            $table->text('mucous')->nullable();
            $table->text('anamnesis')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('treatment')->nullable();
            $table->float('weight', 4, 2)->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->date('date');
            $table->foreignId('pet_id')->constrained()->onDelete('NO ACTION');
            $table->foreignId('user_id')->constrained()->onDelete('NO ACTION');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinical_histories');
    }
};
