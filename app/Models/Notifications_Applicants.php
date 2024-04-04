<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notifications_Applicants extends Model
{
    protected $table = 'notification_applicants';

    static $rules = [
        'comentario' => 'required|string',
        'estado' => 'required|string',
        'job_position_id' => 'required',
        'resume_id' => 'required',
    ];





    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['comentario', 'estado', 'job_position_id', 'resume_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function JobPosition()
    {
        return $this->belongsTo(\App\Models\Job_Position::class, 'job_position_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jopoResumes()
    {
        return $this->hasMany(\App\Models\JopoResume::class, 'id', 'resume_id');
    }

}
