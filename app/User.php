<?php

namespace App;

use App\Vacancy;
use App\Resume;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all users vacancies
     */
    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }

    /**
     * Get all users resume
     */
    public function resume()
    {
        return $this->hasMany(Resume::class);
    }

}
