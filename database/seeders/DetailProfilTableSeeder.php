<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DetailProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_perpus')->insert([
            [
                'id_user' => 'U1',
                'id_perpus' => 'P1',
                'pengunjung' => 15,
                'member' => 13,
                'peminjaman' => 9,
                'judul' => 10,
                'eksemplar' => 100,
                'tahun' => '2021',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_user' => 'U1',
                'id_perpus' => 'P2',
                'pengunjung' => 10,
                'member' => 8,
                'peminjaman' => 4,
                'judul' => 10,
                'eksemplar' => 100,
                'tahun' => '2021',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
