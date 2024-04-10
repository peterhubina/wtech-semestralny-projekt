<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 25);
            $table->timestamps();
            $table->softDeletes();
        });

        $categories = [
            ['title' => 'Plants', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'Gardening Tools', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'Seeds', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['title' => 'Garden Care', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
