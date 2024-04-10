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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('quantity');
            $table->decimal('priceSummary', 10, 2);
            $table->timestamp('createdAt')->nullable();
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('productId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
