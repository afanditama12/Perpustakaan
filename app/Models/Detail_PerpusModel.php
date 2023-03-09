<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_PerpusModel extends Model
{
    use HasFactory;
    
    protected $table = 'detail_perpus';

    protected $fillable = ['id_user','id_perpus', 'pengunjung', 'member', 'peminjaman', 'judul', 'eksemplar', 'tahun'];
    
    public function profil()
    {
        return $this->hasOne('App\Models\ProfilModel', 'id_perpus', 'id_perpus');
    }

}
