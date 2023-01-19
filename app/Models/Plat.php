<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\PhotoPlat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $table = 'plat';
    protected $primaryKey = 'id';

    /**
     * Cette fonction permet de récupérer la catégorie
     *
     * @return Categorie
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    /**
     * Cette fonction permet de récupérer la photo
     *
     * @return PhotoPlat
     */
    public function photo()
    {
        return $this->hasOne(PhotoPlat::class);
    }

    /**
     * Cette fonction permet de récupérer la collection d'étiquettes
     *
     * @return Collection
     */
    public function etiquettes()
    {
        return $this->belongsToMany(Etiquette::class);
    }
}
