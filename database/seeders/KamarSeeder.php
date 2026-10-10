<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\Kos;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $fasilitasKamar = ['Kasur', 'Lemari', 'Meja Belajar', 'AC', 'Kamar Mandi Dalam', 'Kipas Angin', 'Jendela'];
        $ukuran = ['3x3 m', '3x4 m', '4x4 m', '4x5 m'];

        // Setiap kos diberi 2 kamar -> total 20 data kamar
        foreach (Kos::all() as $kos) {
            for ($i = 1; $i <= 2; $i++) {
                Kamar::create([
                    'kos_id'        => $kos->id,
                    'nama_kamar'    => 'Kamar ' . chr(64 + $i) . $faker->numberBetween(1, 9),
                    'fasilitas'     => implode(', ', $faker->randomElements($fasilitasKamar, 3)),
                    'ukuran_kamar'  => $faker->randomElement($ukuran),
                    'harga'         => $faker->numberBetween(5, 25) * 100000,
                    'slot_tersedia' => $faker->numberBetween(0, 5),
                ]);
            }
        }
    }
}