<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Jabatan::create([
            'id' => 1,
            'nama_jabatan' => 'Anggota',
            'persentase' => 40,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        Jabatan::create([
            'id' => 2,
            'nama_jabatan' => 'Pengurus',
            'persentase' => 30,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        Jabatan::create([
            'id' => 3,
            'nama_jabatan' => 'Dewan Eksklusif',
            'persentase' => 30,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
