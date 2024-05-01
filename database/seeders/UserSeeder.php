<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 admin users
        for ($i = 0; $i < 3; $i++) {
            User::factory()->admin()->create([
                'email' => 'admin' . ($i + 1) . '@test.com',
            ]);
        }

        // Create 15 regular users
        for ($i = 0; $i < 15; $i++) {
            User::factory()->create([
                'email' => 'user' . ($i + 1) . '@test.com',
            ]);
        }
    }
}
