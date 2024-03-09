<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = 'role';
    use HasFactory;
    protected $fillable = ['role_name','updated_at1','created_at1','role_desc'];
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
