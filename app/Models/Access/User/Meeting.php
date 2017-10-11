<?php

namespace App\Models\Access\User;


use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //
    public $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['date', 'venue', 'agenda','title'];

   
 
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    
}
