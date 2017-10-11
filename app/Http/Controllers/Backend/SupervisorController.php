<?php
 
namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Helpers\Auth\Auth;
use App\Models\Access\User\User;
//use Illuminate\Support\Facades\DB;
use Charts;
//use App\Models\Access\User\Meeting;
use Mail;
//use App\User;
use Storage;
use Carbon\Carbon;
//use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Services\Access\Access;
use Illuminate\Support\Facades\DB;
use App\Models\Access\User\Meeting;
use App\Mail\reminder;
use App\Models\Access\User\Course;
use App\Models\Access\User\study;
use App\Models\Access\User\milestone;
use App\Models\Access\User\engagement;
use Cmgmyr\Messenger\Models\Message;
use App\Models\Access\User\supervision;
//use App\Models\Access\User\User;


class SupervisorController extends Controller 
 
{
    


    public function dash(){ 
 	

    	$meet = DB::table('role_user')
    							->join('users', 'role_user.user_id','=','users.id')
                                ->join('supervisions','role_user.user_id','=','supervisions.user_id')
                               
                                ->where('supervised_by_id','=',auth()->user()->id)
                                // ->where('deleted','=',0)
                                ->get();
                          //  dd($meet);exit;   

                    foreach ($meet as $key) {
                            
                    $chart1 = Charts::database(Meeting::all()->where('user_id','=',$key->user_id), 'bar', 'highcharts')->dateColumn('date')
                     ->title('Meetings')
                      ->elementLabel("Number of meetings scheduled")
                      ->dimensions(300, 300)
                      ->responsive(false)
                      ->lastBymonth();


                       }


                    foreach ($meet as $key) {
                          $chart2 = Charts::database(Milestone::all(), 'line', 'highcharts')
                     ->title('Milestones')
                      ->elementLabel("Number of milestones set")
                      ->dimensions(300, 300)
                      ->responsive(false)
                      ->lastBymonth();
                       }
                       //dd($chart2);exit;

                     foreach ($meet as $key) {
                       $chart4 = Charts::database(course::all()->where('user_id','=',$key->user_id), 'line', 'highcharts')->dateColumn('created_at')
                     ->title('Courses Registered')
                      ->elementLabel("Number of courses registered for")
                      ->dimensions(300, 300)
                      ->responsive(false)
                      ->lastBymonth();
                     }

                      
                   

                    //print_r($chart4);exit;
    
    	return view('backend.dashboard',['chart1' => $chart1],['chart2' => $chart2]
            )->with('meet',$meet)->with('chart4', $chart4);
    }


  public function show_message() {

        //$currentUserId = Auth::user()->id;
        //$currentUserId = 1;
        $currentUserId=access()->id();

        // All threads, ignore deleted/archived participants
       // $threads = Thread::getAllLatest()->get();
        //$threads = Thread::forUser(1);
        // All threads that user is participating in
         $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();

        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();

   

       return view('backend.access.supervisor.dash-message' , compact('threads', 'currentUserId'));
    }


    public function profile(){

        $data =DB::table('users')-> where('id','=',auth()->user()->id)->get();

       
       // print_r($data);exit;

        return view('backend.access.supervisor.dash-profile')->with('data',$data);
    }

}
 