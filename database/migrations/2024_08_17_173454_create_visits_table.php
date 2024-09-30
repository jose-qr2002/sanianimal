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
            $table->smallInteger('heart_rate')->nullable();
            $table->smallInteger('respiratory_rate')->nullable();
            $table->decimal('temperature', 5,2);
            $table->text('anamnesis')->nullable();
            $table->text('symptoms')->nullable();
            $table->text('exams')->nullable();
            $table->text('differential_diagnosis')->nullable();
            $table->text('definitive_diagnosis')->nullable();
            $table->text('treatment')->nullable();
            $table->text('exam_results')->nullable();
            $table->text('recommendations')->nullable();
            $table->text('recipes')->nullable();
            $table->float('weight', 4, 2)->nullable();
            $table->decimal('price', 8,2);
            $table->date('date');
            $table->time('time');
            $table->unsignedBigInteger('clinical_history_id');
            $table->timestamps();

            $table->foreign('clinical_history_id')
                ->references('id')
                ->on('clinical_histories')
                ->onDelete('NO ACTION');
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
