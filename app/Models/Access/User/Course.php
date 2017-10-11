<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    //
//protected $table;

    public $fillable = ['course_name', 'course_code', 'credit_units','institution','department,duration,semster,year'];
}
