<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bidang = Bidang::query()->create([
            'nama' => 'Bendahara',
        ]);
        $user = User::query()->create([
            'nip' => '1253425342432',
            'name' => 'alifah',
            'email' => 'alifah@gmail.com',
            'password' => Hash::make(1234567890),
            'role' => Role::BENDAHARA,
        ]);
        $user->pegawai()->create([
            'nip' => 1253425342432,
            'nama' => 'alifah',
            'jenis_kelamin' => 'L',
            'tempat_lahir' => 'Karawang',
            'tanggal_lahir' => '2002-10-01',
            'no_hp' => 1234567890,
            'alamat' => 'sajgsadjgsad',
            'kode_bidang' => $bidang->kode,
        ]);
    }
}
