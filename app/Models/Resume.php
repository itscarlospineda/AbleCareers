<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Resume extends Model
{
    protected $table = 'resume';

    static $rules = [
        'info' => 'required|string',

        'education' => 'required|string',
        'education_pos' => 'required|string',
        'education_years' => 'required|string',
        'education_two' => 'required|string',
        'education_two_pos' => 'required|string',
        'education_two_years' => 'required|string',

        'work_experience' => 'required|string',
        'work_pos' => 'required|string',
        'work_years' => 'required|string',
        'work_two_experience' => 'required|string',
        'work_two_pos' => 'required|string',
        'work_two_years' => 'required|string',

        'extra' => 'required|string',
        'reference' => 'required|string',
        'reference_num' => 'required|string',
        'reference_two' => 'required|string',
        'reference_two_num' => 'required|string',
        'photo' => 'required|string',
        'user_id' => 'required',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($resume) {
            $user = Auth::user(); // Obtener el usuario autenticado
            $resume->user_id = $user->id; // Asignar el id del usuario autenticado al campo user_id
        });
    }



    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'info',
        'education',
        'education_pos',
        'education_years',
        'education_two',
        'education_two_pos',
        'education_two_years',
        'work_experience',
        'work_pos',
        'work_years',
        'work_two_experience',
        'work_two_pos',
        'work_two_years',
        'extra',
        'reference',
        'reference_num',
        'reference_two',
        'reference_two_num',
        'photo',
        'user_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jopoResumes()
    {
        return $this->hasMany(\App\Models\JopoResume::class, 'resume_id', 'id');
    }


    public function notifications()
    {
        return $this->hasMany(Notifications_Applicants::class);
    }


}
