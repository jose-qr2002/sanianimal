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
        Schema::create('applied_vaccines', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time')->nullable();
            $table->text('observation')->nullable();
            $table->foreignId('vaccine_id')->constrained()->onDelete('NO ACTION');

            $table->unsignedBigInteger('clinical_history_id')->nullable();

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
        Schema::dropIfExists('applied_vaccines');
    }
};
