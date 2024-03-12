<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Position extends Model
{
    protected $table = 'job_position';
    use HasFactory;
    protected $primaryKey = 'jobpo_id';
}
