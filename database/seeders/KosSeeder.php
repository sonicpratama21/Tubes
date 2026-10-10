<?php

namespace Database\Seeders;

use App\Models\Kos;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KosSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Buat 5 pemilik (user) dulu, karena id_pemilik butuh data di tabel users
        $pemilikIds = [];
        for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
            ]);
            $pemilikIds[] = $user->id;
        }

        $daerah = ['Jatinangor', 'Dago', 'Buah Batu', 'Setiabudi', 'Cibiru', 'Antapani'];
        $fasilitasKos = ['WiFi', 'Parkir Motor', 'Dapur Bersama', 'CCTV', 'Laundry', 'Mushola', 'Ruang Tamu'];

        // 10 data kos
        for ($i = 1; $i <= 10; $i++) {
            Kos::create([
                'id_pemilik' => $faker->randomElement($pemilikIds),
                'nama_kos'   => 'Kos ' . $faker->lastName() . ' ' . $faker->randomElement(['Residence', 'Putra', 'Putri', 'Mawar', 'Asri']),
                'daerah_kos' => $faker->randomElement($daerah),
                'harga'      => $faker->numberBetween(5, 25) * 100000,   // 500rb - 2,5jt
                'fasilitas'  => implode(', ', $faker->randomElements($fasilitasKos, 4)),
            ]);
        }
    }
}