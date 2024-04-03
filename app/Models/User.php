<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_has_role', 'user_id', 'role_id');
    }


    protected $fillable = [
        'name',
        'lastName',
        'email',
        'phoneNumber',
        'password',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    static $rules = [
        'name' => 'required',
        'email' => 'required',
        'lastName' => 'required',
        'phoneNumber' => 'required',

    ];

    public function adminlte_desc()
    {
        $user = Auth::user();
        $currentUser = User::findOrFail($user->id);
        $userHighRole = $currentUser->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();
        return $userHighRole->role_name;
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function companyUser()
    {
        return $this->hasOne(CompanyUser::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class, 'user_id', 'id');
    }

    public function userRequests()
    {
        return $this->hasMany(UserRequest::class, 'user_id', 'id');
    }

    public function notifications()
    {
        return $this->hasManyThrough(Notifications_Applicants::class, Resume::class);
    }

}
