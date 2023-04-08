<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'B-0001',
                'nama' => 'Note Book',
                'harga' => 100_000,
                'satuan_kode' => 'S-0001',
            ]
        ];
        Barang::query()->upsert($data, 'kode');
    }
}
