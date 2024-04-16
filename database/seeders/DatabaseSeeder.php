<?php

namespace Database\Seeders;

use App\Infrastructure\Models\AccountModel;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // AccountModel::factory(10)->create();

        AccountModel::factory()->create([
            'name' => 'Test AccountModel',
            'email' => 'test@example.com',
        ]);
    }
}
