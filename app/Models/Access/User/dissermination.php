<?php


namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class dissermination extends Model
{
    //

    public $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['date', 'comment', 'mode'];

   
 
    protected $dates = ['deleted_at'];
}
