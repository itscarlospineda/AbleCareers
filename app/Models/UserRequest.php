<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRequest
 *
 * @property $id
 * @property $user_id
 * @property $request_info
 * @property $request_status
 * @property $is_active
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserRequest extends Model
{
    protected $table = 'user_request';

    static $rules = [
        'user_id' => 'required',
        'request_info' => 'required|string',
        'request_status' => 'required|string',
        'is_active' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'request_info', 'request_status', 'is_active'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }


}
