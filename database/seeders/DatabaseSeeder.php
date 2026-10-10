<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KosSeeder::class,     // harus dulu
            KamarSeeder::class,   // setelah kos ada
        ]);
    }
}