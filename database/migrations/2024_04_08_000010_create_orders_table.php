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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('totalPrice', 10, 2);
            $table->enum('payment', ['Card', 'Google Pay']);
            $table->timestamp('createdAt')->nullable();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('shippingId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shippingId')->references('id')->on('shipping_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
