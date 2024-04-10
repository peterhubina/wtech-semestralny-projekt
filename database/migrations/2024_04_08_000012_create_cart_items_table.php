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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('quantity');
            $table->decimal('priceSummary', 10, 2);
            $table->timestamp('createdAt')->nullable();
            $table->unsignedBigInteger('cartId');
            $table->unsignedBigInteger('productId');
            $table->foreign('cartId')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
