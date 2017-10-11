<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{ 
    //

    public $fillable = ['title','status','minutes','comment','activity_type'];
}
