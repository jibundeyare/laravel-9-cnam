<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actu extends Model
{
    use HasFactory;

    protected $table = 'actu';
    protected $primaryKey = 'id';
}
