<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class JopoResume extends Model
{

    protected $table = 'jopo_resume';

    protected $primaryKey = 'id';

    static $rules = [
        'id' => 'required',
        'resume_id' => 'required',
        'job_position_id' => 'required'
    ];

    protected $fillable = [
        'resume_id',
        'job_position_id'
    ];

    public function jobPosition()
    {
        //return $this->belongsTo(\App\Models\JobPosition::class);
    }

    public function resume()
    {
        //return $this->belongsTo(\App\Models\Resume::class);
    }


}
