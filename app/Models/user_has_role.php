<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_has_role extends Model
{
    protected $table = 'user_has_role';
    protected $fillable = [
        'user_id',
        'role_id',
        'is_active',
    ];

    // Define la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define la relación con el modelo Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
