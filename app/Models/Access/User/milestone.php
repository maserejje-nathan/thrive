<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class milestone extends Model
{
     public $fillable = ['proposal_write', 'desertation_write','desertation_submit'];

}
