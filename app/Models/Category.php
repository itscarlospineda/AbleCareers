<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; // Especifica el nombre de la tabla

    use HasFactory;

    protected $primaryKey = 'cat_id';
}
