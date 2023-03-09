<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap_BukuModel extends Model
{
    use HasFactory;

    protected $table = 'rekap_buku';

    protected $fillable = ['id_perpus', 'judul', 'eksemplar', 'tahun'];

    public function profil()
    {
        return $this->hasOne('App\Models\ProfilModel', 'id_perpus', 'id_perpus');
    }
}
