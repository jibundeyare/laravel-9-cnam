<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoAmbiance extends Model
{
    use HasFactory;

    protected $table = 'photo_ambiance';
    protected $primaryKey = 'id';
}
