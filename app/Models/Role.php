<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role'; // Especifica el nombre de la tabla

    protected $fillable = [
        'role_name',
        'role_desc',
        'is_active',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_role', 'role_id', 'user_id');
    }
}
