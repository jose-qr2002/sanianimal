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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique()->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('price', 5, 2);
            $table->integer('stock');
            $table->string('brand')->nullable();
            $table->enum('measurement', ['units','kilograms','grams']);
            $table->string('image')->nullable();

            $table->foreignId('supplier_id')->nullable()->constrained()->onDelete('no action');
            $table->unsignedBigInteger('category_id')->nullable();

            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
