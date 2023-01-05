<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $table = 'plat';
    protected $primaryKey = 'id';

    /**
     * Cette fonction permet de récupérer la photo
     *
     * @return PhotoPlat
     */
    public function photo()
    {
        return $this->hasOne(PhotoPlat::class);
    }
}
