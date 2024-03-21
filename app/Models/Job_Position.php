<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Position extends Model
{
    protected $table = 'job_position';
    use HasFactory;
    protected $primaryKey = 'id';

    public function company(){
        return $this->belongsTo(Company::class, 'comp_id');
    }
}
