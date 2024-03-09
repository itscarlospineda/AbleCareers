<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class user_has_role extends Model
{
    protected $table = 'user_has_role';

    public function cargo()
    {
        return $this->belongsTo(role::class, 'role_id');
    }

    protected $fillable = [
        'role_id',
        'updated_at2',
        'created_at2',
    ];
}
