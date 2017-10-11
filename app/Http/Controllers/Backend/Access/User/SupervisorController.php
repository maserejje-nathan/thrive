<?php

namespace App\Http\Controllers\Backend\Access\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SupervisorController extends Controller
{
    //


    public function index(){


    	return view('backend.access.supervisor.dashboard');
    }
}
 