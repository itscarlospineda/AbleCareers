<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 *
 * @property $id
 * @property $comp_name
 * @property $comp_mail
 * @property $comp_phone
 * @property $comp_city
 * @property $comp_depart
 * @property $user_id
 * @property $is_active
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property JobPosition[] $jobPositions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Company extends Model
{
    
    static $rules = [
		'comp_name' => 'required|string',
		'comp_mail' => 'required|string',
		'comp_phone' => 'required|string',
		'comp_city' => 'required|string',
		'comp_depart' => 'required|string',
		'user_id' => 'required',
		'is_active' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['comp_name','comp_mail','comp_phone','comp_city','comp_depart','user_id','is_active'];


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
    public function jobPositions()
    {
        //return $this->hasMany(\App\Models\JobPosition::class, 'id', 'company_id');
    }
    

}
