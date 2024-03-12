<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
		'is_active' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['info','education','work_experience','extra','reference','photo','user_id','is_active'];


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
