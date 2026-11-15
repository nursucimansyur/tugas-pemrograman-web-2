<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        $faker = fake('id_ID');

        $namaBarang = $faker->randomElement([
            'Kipas Angin Duduk', 'Meja Belajar Kayu', 'Kursi Plastik', 'Lampu Belajar LED',
            'Dispenser Galon Bawah', 'Setrika Listrik', 'Rice Cooker Mini', 'Terminal Listrik 4 Lubang',
            'Rak Buku Susun', 'Bantal Kepala', 'Guling', 'Sprei Kasur', 'Hanger Baju',
            'Ember Plastik', 'Gayung Mandi', 'Sapu Lantai', 'Alat Pel', 'Tempat Sampah',
            'Cermin Dinding', 'Jam Dinding', 'Piring Keramik', 'Gelas Kaca', 'Sendok Makan',
            'Wajan Penggorengan', 'Panci Rebus', 'Kompor Gas 1 Tungku', 'Botol Minum',
            'Buku Tulis', 'Pulpen Hitam', 'Penggaris Besi', 'Stapler', 'Gunting Kertas'
        ]);

        $keterangan = $faker->randomElement([
            'Baru', 'Bekas', 'Ukuran Besar', 'Ukuran Kecil', 'Warna Hitam',
            'Warna Putih', 'Warna Biru', 'Seri Standar', 'Premium', 'Cadangan'
        ]);

        return [
            'item_code' => 'BRG-' . $faker->unique()->numberBetween(100, 999),
            'name'      => $namaBarang . ' (' . $keterangan . ')',
            'category'  => $faker->randomElement(['Elektronik', 'Alat Tulis', 'Perabotan', 'Dapur']),
            'quantity'  => $faker->numberBetween(1, 25),
            'condition' => $faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
        ];
    }
}