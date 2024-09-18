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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->text('reason')->nullable();
            $table->text('mucous')->nullable();
            $table->text('anamnesis')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('treatment')->nullable();
            $table->float('weight', 4, 2)->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->date('date');
            $table->unsignedBigInteger('clinical_history_id');
            $table->timestamps();

            $table->foreign('clinical_history_id')
                ->references('id')
                ->on('clinical_histories')
                ->onDelete('NO ACTION');

            $table->unique(['number', 'clinical_history_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
