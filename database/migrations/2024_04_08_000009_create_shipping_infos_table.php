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
        Schema::create('shipping_infos', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('phoneNumber', 20);
            $table->string('email', 254);
            $table->text('note')->nullable();
            $table->enum('delivery', ['Courier', 'Us', 'Personal']);
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->timestamp('created_at');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_infos');
    }
};
