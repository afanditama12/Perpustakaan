<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profil')->insert([
            [
                'id_user' => 'U1',
                'id_perpus' => 'P1',
                'nmlembaga' => 'Perpustakaan Umum Kota Kediri',
                'nmpenanggungJawab' => 'examplename penanggung jawab',
                'nmpengelola' => 'examplename pengelola',
                'telepon' => '0987655726',
                'alamat' => 'examplealamat',
                'deskripsi' => 'exampledeskripsi',
                'skpendirian' => 'Peraturan Daerah Kota Kediri No.x tahun xxxx',
                'jambuka' => '07.00 - 14.00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
