<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class publication extends Model
{
    //

    public $fillable = ['title','citation','journal','date','volume','issue','pages','status'];
}
