<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
	protected $table = "vacs";
	protected $fillable = ['vname','vcomp','vreqs','vsalary','proved'];

   	/**
     * Get the user that owns the vacancy.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
