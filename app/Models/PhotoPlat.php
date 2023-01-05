<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoPlat extends Model
{
    use HasFactory;

    protected $table = 'photo_plat';
    protected $primaryKey = 'id';

    /**
     * Cette fonction permet de récupérer le plat
     *
     * @return Plat
     */
    public function plat()
    {
        return $this->belongsTo(Plat::class);
    }
}
