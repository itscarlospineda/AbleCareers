<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Position extends Model
{
    use HasFactory;
    protected $table = 'job__positions';
    protected $primaryKey = 'jobpo_id';
}
