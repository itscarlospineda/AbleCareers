<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job_Position extends Model
{
    use HasFactory;

    protected $table = 'job_position';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class, 'comp_id');
    }

    // Método para determinar si el trabajo ya ha sido aplicado
    public function isApplied()
    {
        return $this->jopoResumes()->exists();
    }

    // Relación con la tabla jopo_resume
    public function jopoResumes()
    {
        return $this->hasMany(JopoResume::class, 'job_position_id', 'id');
    }

    // Método para determinar si el usuario ha aplicado a este trabajo
    public function isAppliedByUser($userId)
    {
        return $this->jopoResumes()->where('resume_id', $userId)->exists();
    }
}
