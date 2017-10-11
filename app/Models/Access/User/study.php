<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class study extends Model
{
    //
     public $fillable = ['study_number', 'study_name','user_id', 'objectives','number_papers','data_collection','data_analysis','manuscript','ethical_approval','ethics_status','collection_status','analysis_status','man_status','pub_status'];
}
