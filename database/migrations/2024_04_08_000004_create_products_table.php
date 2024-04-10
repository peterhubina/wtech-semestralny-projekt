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
            $table->string('productCode', 25);
            $table->string('title', 100);
            $table->string('height', 10);
            $table->text('description', 3000);
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('stockQuantity');
            $table->timestamps();
            $table->foreignId('categoryId')->references('id')->on('categories');
            $table->softDeletes();
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