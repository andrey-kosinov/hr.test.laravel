<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{

	protected $fillable = ['rname','rposition','rdesc','rsalary'];

  	/**
     * Get the user that owns the resume.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
