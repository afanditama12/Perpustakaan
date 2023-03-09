<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilModel extends Model
{
    use HasFactory;

    protected $table = 'profil';
    
    protected $fillable = ['id','id_user','id_perpus', 'nmlembaga', 'nmpenanggungJawab', 
                            'nmpengelola', 'alamat', 'skpendirian', 'jambuka', 'facebook',
                            'instagram','deskripsi','logo','telepon'];

    public function scopeSearch($query, $nmlembaga)
    {
        return $query->where('nmlembaga', 'like', "%{$nmlembaga}%");
    }

    public function parent()
    {
        # code...
    }

    public function children()
    {
        # code...
    }

    public function descendants()
    {
        return $this->with('descendants');
    }
}
