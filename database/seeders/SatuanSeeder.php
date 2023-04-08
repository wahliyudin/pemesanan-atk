<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'S-0001',
                'nama' => 'pcs',
            ],
            [
                'kode' => 'S-0002',
                'nama' => 'liter',
            ],
            [
                'kode' => 'S-0003',
                'nama' => 'box',
            ],
            [
                'kode' => 'S-0004',
                'nama' => 'kg',
            ]
        ];
        Satuan::query()->upsert($data, 'kode');
    }
}
