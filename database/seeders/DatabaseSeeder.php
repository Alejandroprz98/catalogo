<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Aquí se registras el seeder de películas
        $this->call([
            MoviesTableSeeder::class,
        ]);
    }
}
