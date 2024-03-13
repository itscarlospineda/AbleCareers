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
		'work_experience' => 'required|string',
		'extra' => 'required|string',
		'reference' => 'required|string',
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
    protected $fillable = ['info','education','work_experience','extra','reference','photo','user_id'];


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
        return $this->hasMany(\App\Models\JopoResume::class, 'id', 'resume_id');
    }
    

}
