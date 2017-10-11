<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use Charts;
use Mail;
use PDF;
use Storage;
use Carbon\Carbon;
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
use App\Models\Access\User\moment;
use App\Models\Access\User\milestone;
use App\Models\Access\User\engagement;
use Cmgmyr\Messenger\Models\Message;
use App\Models\Access\User\supervision;
use App\Models\Access\User\publication;
use App\Models\Access\User\school_visit; 
use App\Models\Access\User\research_prog;
use App\Models\Access\User\supervised_student;
use App\Models\Access\User\conference;
use App\Models\Access\User\goal;



/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

      $id_admin = auth()->user()->id;


      if ($id_admin == 1) {
        # code...

       $meet = DB::select(DB::raw("SELECT * from users,role_user where role_user.role_id = 3 AND role_user.user_id = users.id")); 

       
      }
      else{
            $meet = DB::table('role_user')
                  ->join('users', 'role_user.user_id','=','users.id')
                                ->join('supervisions','role_user.user_id','=','supervisions.user_id')
                               
                                ->where('supervised_by_id','=',auth()->user()->id)
                                // ->where('deleted','=',0)
                                ->get();

      }
         
                          // dd($meet);exit;    

                    


                    
                    //print_r($chart4);exit;
    
      return view('backend.dashboard')->with('meet',$meet); 
    }

// more details from supervised students
  public function supervised_students($id){ 
 	    
    $serve = study::all()->where('user_id','=',$id)->where('deleted','=',0);
    $user = user::all()->where('id','=',$id)->where('deleted','=',0);
    $engage = engagement::all()->where('user_id','=',$id)->where('deleted','=',0);
    $publish= publication::all()->where('user_id','=',$id)->where('deleted','=',0);
    $meet = meeting::all()->where('user_id','=',$id)->where('deleted','=',0);
    $course = course::all()->where('user_id','=',$id)->where('deleted','=',0);
    $moment = moment::all()->where('user_id','=',$id)->where('deleted','=',0);
    $school_visit = school_visit::all()->where('user_id','=',$id)->where('deleted','=',0);
    $res_projects = research_prog::all()->where('user_id','=',$id)->where('deleted','=',0);
    $supervised = supervised_student::all()->where('user_id','=',$id)->where('deleted','=',0);
    $conf = conference::all()->where('user_id','=',$id)->where('deleted','=',0);
    $pdp = goal::all()->where('user_id','=',$id)->where('deleted','=',0);





    
    $id_log = auth()->user()->id;

    $mine = DB::select(DB::raw("SELECT * from users,supervisions where supervisions.user_id = $id AND supervisions.supervised_by_id =  users.id AND supervisions.supervised_by_id != $id_log")); 

 // dd($moment);exit;


      return view('backend.details')->with(['serve' => $serve])->with(['user' => $user])->with(['engage' => $engage])->with(['publish' => $publish])->with(['meet' => $meet])->with(['mine'=>$mine])->with(['course'=>$course])->with(['moment'=>$moment])->with(['school_visit'=>$school_visit])
      ->with(['res_projects'=>$res_projects])->with(['supervised'=>$supervised])->with(['conf'=>$conf])->with(['pdp'=>$pdp]);
    
    }

    public function print_report($id) {
      $user = user::all()->where('id','=',$id)->where('deleted','=',0);
      $course = course::all()->where('user_id','=',$id)->where('deleted','=',0);
      $study = study::all()->where('user_id','=',$id)->where('deleted','=',0);
      $engage = engagement::all()->where('user_id','=',$id)->where('deleted','=',0);
      $meet = meeting::all()->where('user_id','=',$id)->where('deleted','=',0);
      $publish= publication::all()->where('user_id','=',$id)->where('deleted','=',0);
      $moment = moment::all()->where('user_id','=',$id)->where('deleted','=',0);
      $school_visit = school_visit::all()->where('user_id','=',$id)->where('deleted','=',0);
      $res_projects = research_prog::all()->where('user_id','=',$id)->where('deleted','=',0);
      $supervised = supervised_student::all()->where('user_id','=',$id)->where('deleted','=',0);
      $conf = conference::all()->where('user_id','=',$id)->where('deleted','=',0);
      $pdp = goal::all()->where('user_id','=',$id)->where('deleted','=',0);


      $data = array(
              'user'=>$user,
              'study'=>$study,
              'course'=>$course,
              'engage'=>$engage,
              'meet'=>$meet,
              'publish'=>$publish,
              'moment'=>$moment,
              'school_visit'=>$school_visit,
              'res_projects'=>$res_projects,
              'supervised'=>$supervised,
              'conf'=>$conf,
              'pdp'=>$pdp,
                ); 
      

      //prin 

        $pdf = PDF::loadview('backend.report',$data);
        return $pdf->stream();
    }

   

}
