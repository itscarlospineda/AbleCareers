<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JopoCategory
 *
 * @property $category_id
 * @property $job_position_id
 * @property $is_active
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Job_Position $jobPosition
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JopoCategory extends Model
{
    protected $table = 'jopo_category';


    static $rules = [
		'category_id' => 'required',
		'job_position_id' => 'required',
		'is_active' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id','job_position_id','is_active'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function jobPosition()
    // {
    //     return $this->belongsTo(\App\Models\JobPosition::class, 'job_position_id', 'id');
    // }


}
