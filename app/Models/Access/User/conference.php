<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class conference extends Model 


{

	public $fillable = ['conference_name', 'role', 'venue','date','comment'];
    //
}
