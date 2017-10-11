<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Helpers\Auth\Auth;
use App\Models\Access\User\conference;
use App\Models\Access\User\goal;
use App\Models\Access\User\moment;
use App\Models\Access\User\publication;
use App\Models\Access\User\research_prog;
use App\Models\Access\User\school_visit;
use App\Models\Access\User\supervised_student;
use Illuminate\Support\Facades\App;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exceptions\GeneralException;
//use App\Http\Controllers\Controller;
use App\Helpers\Frontend\Auth\Socialite;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Access\User\Meeting;
use App\Models\Access\User\Course;
use App\Models\Access\User\study;
use App\Models\Access\User\milestone;
use App\Models\Access\User\engagement;
use App\Models\Access\User\supervision;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Models\Access\User\User;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()

    {
    		$supervisor = DB::table('role_user')
    							->join('users', 'role_user.user_id','=','users.id')->where('role_id','=',2)
                                //->join('supervisions','role_user.user_id','=','supervisions.user_id')
                                ->get();

    	    $id_log =  auth()->user()->id;

                 $mine = DB::select(DB::raw("SELECT * from users,supervisions where supervisions.user_id = $id_log AND supervisions.supervised_by_id =  users.id")); 
                 
       //dd($mine);exit;
           
        return view('frontend.user.account')->with('supervisor',$supervisor)->with('mine',$mine);
    }



    //function to attach supervisors to students 

    public function addsupervisor($id){

        $student_id =  auth()->user()->id;

        

    $check = DB::table('supervisions')->where('supervised_by_id','=',$id)->where('user_id','=',$student_id)->where('deleted','=',0)->first();

    if (is_null($check)){
        $data = array( 

              'user_id'=>$student_id,
              'supervised_by_id'=>$id,

                );        

        supervision::insert($data);

        return redirect()->route('frontend.user.account')->withFlashSuccess(trans('supervisor has been added successfully'));

           
    }else {
          
         return redirect()->route('frontend.user.account')->withFlashDanger(trans(' sorry supervisor already added'));


    }


    
    }



    public function delete_supervisor($id) {

         $page = supervision::find($id);

            // Make sure you've got the Page model
            if($page) {
                $page->deleted = 1;
                $page->save(); 
                }

                return redirect()->route('frontend.user.dashboard');
    }

    public function search(Request $request){
        $q = $request->q;

        //dd($q) ;exit;
        $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();

       // foreach ($user as $key){

         // echo $key->id."<br>";
           // $supervisor = DB::table('role_user')
              //  ->join('users', 'role_user.user_id','=','users.id')->where('role_id','=',2)->where('user_id','=',$key->id)
              //  ->get();

          //  dd($user);
        //}

       // dd($user);
        //exit;



        if(count($user) > 0)
            return view('frontend.user.supervisor_search',compact(['user'],['q']));
        else return redirect()->route('frontend.user.account')->withFlashWarning(trans(' sorry search no results found'));

    }

    public function supervise_delete($id){

        supervision::destroy($id);

    return redirect()->route('frontend.user.account')->withFlashSuccess(trans(' supervisor has been deleted successfully'));
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




        $pdf = PDF::loadview('backend.report',$data);
        return $pdf->stream();

    }

}
 