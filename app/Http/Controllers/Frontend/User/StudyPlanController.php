<?php

namespace App\Http\Controllers\Frontend\User;
use App\Helpers\Auth\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Helpers\Frontend\Auth\Socialite;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Access\User\Meeting;
use App\Models\Access\User\status;
use App\Models\Access\User\Course;
use App\Models\Access\User\study;
use App\Models\Access\User\milestone;
use App\Models\Access\User\visit;
use App\Models\Access\User\engagement;
use App\Models\Access\User\school_visit;
use App\Models\Access\User\conference;
use App\Models\Access\User\goal;
use App\Models\Access\User\moment;
use App\Models\Access\User\dissermination;
use App\Models\Access\User\publication;
use App\Models\Access\User\supervised_student;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Support\Facades\Input;
use App\Models\Access\User\research_prog;
//use App\Models\Access\User\supervised_student;

use Response;




class StudyPlanController extends Controller{

	use AuthenticatesUsers;




    //
//course completion plan data is handled here.
	public function  index(){



}
// meeting plan data here insert to db
		public function meet(Request $request){
			$input =   $request->all();
			$id =  auth()->user()->id;

			$data = array(

			  'title'=>$input['title'],
			  'date'=>$input['date'],
			  'venue'=>$input['venue'],
			  'agenda'=>$input['agenda'],
			  'user_id'=>$id,

				);


 		Meeting::insert($data);


 		return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Meeting has been set successfully'));

}
//course completion plan insert to db
		public function courses(Request $request){
			$input =   $request->all();
			$id =  auth()->user()->id;

			//print_r($input);exit;


			$data = array(

		   	         'course_name' =>$input['course_name'],
		   	         'course_code'=>$input['course_code'],
		   	          'credit_units'=>$input['credit_units'],
		   	          'institution'=>$input['institution'],
		   	          'department'=>$input['department'],
		   	          'semster'=>$input['semster'],
		   	          'year'=>$input['year'],
		   	          'type'=>$input['type'],
		   	          'user_id'=>$id,



		   					);

		   			course::insert($data);


			return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Course Plan has been set successfully'));




}


		public function development(Request $request){


			$input =   $request->all();

			//dd($input);exit;
			$id =  auth()->user()->id;

			$data = array(
			  'from'=>$input['from'],
			  'to'=>$input['to'],
			  'evidence'=>$input['evidence'],
			  'time_frame'=>$input['time_frame'],
			  'target'=>$input['target'],
			  'achieve'=>$input['achieve'],
			  'objective'=>$input['objective'],
			  'goal'=>$input['goal'],
			  'user_id'=>$id,

				);


 		goal::insert($data);


 		return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('development plan has been set successfully'));




		}

//study plan insert to db
	public function plan(Request $request){
		  $id =  auth()->user()->id;
		  $input =   $request->all();

 	$am = $input['study_number'];

	 $check = DB::table('studies')
	 				->where('study_number','=',$am)
	 				->where('user_id','=',$id)
	 				->where('deleted','=',0)
	 				->get()->toarray();
	// $user_study =  DB::table('studies')->where('user_id','=',$id)->get();


	//print_r($check);exit;


	//print( $number);exit;



		  if($check == false){


		  		  $data = array(

		   	         'study_name' =>$input['study_name'],
		   	         'study_number'=>$input['study_number'],
		   	          'objectives'=>$input['objectives'],
		   	          'ethical_approval'=>$input['ethical_approval'],
		   	          'data_collection'=>$input['data_collection'],
		   	          'data_analysis'=>$input['data_analysis'],
		   	          'manuscript'=>$input['manuscript'],
		   	          'number_papers'=>$input['number_papers'],
		   			  'user_id'=>$id,

		   					);

		   			study::insert($data);

		  			return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Study Plan has been set successfully'));


 		}

 		else{


 					return redirect()->route('frontend.user.dashboard')->withFlashDanger(trans('Sorry ' .auth()->user()->name. ' this study plan already exists '));



 			}

 			//return redirect()->route('frontend.user.dashboard');

		}


//milestones insert to db
	public function activity_create(Request $request){


	//milestone::create($request->all());
	$input =   $request->all();
			$id =  auth()->user()->id;

			$data = array(

			  'proposal_write'=>$input['proposal_write'],
			  'desertation_write'=>$input['desertation_write'],
			  'desertation_submit'=>$input['desertation_submit'],
			  'year'=>$input['year'],
			  'quarters'=>$input['quarters'],
			  'user_id'=>$id,


				);


 		milestone::insert($data);



	  return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('DESERTATION plan has been saved successfully'));



		}


//engagement plan insert to db

		public function engage(Request $request){

			$input =   $request->all();
			$id =  auth()->user()->id;

			$data = array(

			  'engage_type'=>$input['engage_type'],
			  'audience'=>$input['audience'],
			  'frequency'=>$input['frequency'],
			  'year'=>$input['year'],
			  'comments'=>$input['comments'],
			  'user_id'=>$id,


				);


 		      engagement::insert($data);

					 return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Engagement has been saved successfully'));

		}



		public function dissermination(Request $request){

			$input =   $request->all();
			$id =  auth()->user()->id;

			$data = array(

			  'mode'=>$input['mode'],
			  'date'=>$input['date'],
			  'comment'=>$input['comment'],
			  'user_id'=>$id,

				);


 		      dissermination::insert($data);

					 return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Dissermination plan has been saved successfully'));

		}
//show saved data in tables

		 public function showstudy(){
		 		$id =  auth()->user()->id;
		 		$plans = DB::table('studies')->where('user_id','=',$id)->where('deleted','=',0)->get();

		 		$meet = DB::table('meetings')
		 						  	->where('deleted','=',0)
		 						  	->where('user_id','=',$id)
		 						  	->where('status','=',0)->get();
		 	    $course = DB::table('courses')->where('deleted','=',0)->where('user_id','=',$id)->get();


		 		//print_r($plans);exit;



			return view('frontend.user.showstudy')->with('plans',$plans)->with('course',$course);

		}
//delete a study plan.
		public function delstudy($id){

				$page = study::find($id);

			// Make sure you've got the Page model
			if($page) {
			    $page->deleted = 1;
			    $page->save();
				}


		return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Study Plan deleted'));
		}

		//edit a particular study by it's id

		public function editstudy($id)

		{

	       $study = study::findOrFail($id);

	    return view('frontend.user.editstudy', compact('study'));
		}

		//UPDATE STUDY
		public function updatestudy(Request $request, $id){

        	study::find($id)->update($request->all());


        return redirect()->route('frontend.user.showstudy')->withFlashSuccess(trans('update has been successfull'));

        }

		 public function showcourse(){
		 		$id =  auth()->user()->id;
		 		//$count = courses::count();


		 		$course = DB::table('courses')->where('deleted','=',0)->where('user_id','=',$id)->get();
		 		//print_r($course);exit;

			    return view('frontend.user.showcourse')->with('course',$course);
		}

		public function remove_course(Request $req){


			//echo $id;exit;
			$page = course::find($req->id)->delete ();


		return response ()->json ();

		}



		public function editcourse($id)

		{

	       $study = course::findOrFail($id);

	    return view('frontend.user.courseedit', compact('study'));
		}

		//UPDATE STUDY
		public function updatecourse(Request $request, $id){


			$input =   $request->all();
			$userid =  auth()->user()->id;


			DB::table('courses')
					->where('id','=',$id)
					->update([
							'course_name' =>$input['course_name'],
				   	        'course_code'=>$input['course_code'],
				   	         'credit_units'=>$input['credit_units'],
				   	         'institution'=>$input['institution'],
				   	         'department'=>$input['department'],
				   	         'semster'=>$input['semster'],
				   	         'year'=>$input['year'],
				   	         'status'=>$input['status'],
				   	         'type'=>$input['type'],
				   	         'user_id'=>$userid,
							]);

           return redirect()->route('frontend.user.showcourse')->withFlashSuccess(trans('update has been successfull'));


    }

		 public function showmeet(){



		 		$id =  auth()->user()->id;
		 		$meet = DB::table('meetings')
		 						  	->where('deleted','=',0)
		 						  	->where('user_id','=',$id)
		 						  	->where('status','=',0)->get();

             $conf = conference::all()->where('user_id','=',$id)->where('deleted','=',0);


			return view('frontend.user.showmeet',compact('conf','meet'));


		}
		public function delmeet($id){
			$page = Meeting::find($id);

			// Make sure you've got the Page model
			if($page) {
			    $page->deleted = 1;
			    $page->save();
				}

				return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Meeting Plan deleted'));

		}

		public function editmeet($id) {

	       $study = Meeting::findOrFail($id);

	    return view('frontend.user.editmeet', compact('study'));

		}

		//UPDATE STUDY
		public function updatemeet(Request $request, $id){

        	Meeting::find($id)->update($request->all());


        return redirect()->route('frontend.user.showmeet')->withFlashSuccess(trans('update has been successfull'));


    		}


    	public function editstatus_meet($id){

    		$meet = Meeting::findOrFail($id);

    		return view('frontend.user.status.editstatus_meet', compact('meet'));
    	}


    	public function updatestatus_meet(Request $request, $id){

    		$input =   $request->all();
			$file = $request->file('minutes');
			//$file = $request->minutes;

			if ($request->hasFile('minutes')) {

			$file = $request->minutes->store('minutes');
//echo
			DB::table('meetings')
            ->where('id', $id)
            ->update([
                     'status' =>$input['status'],
            		 'comment'=>$input['comment'],
            		 'minutes'=>$file,
                     'title'=>$input['title'],
            	]);




        return redirect()->route('frontend.user.showmeet')->withFlashSuccess(trans('status update has been successfull'));
            }
            else{

            }
                $input =   $request->all();
                    DB::table('meetings')
                        ->where('id', $id)
                        ->update(['status' =>$input['status'],
                                  'comment'=>$input['comment'],
                                  'title'=>$input['title'],
                        ]);

                return redirect()->route('frontend.user.showmeet')->withFlashSuccess(trans('status update has been successfull'));

    		}




    		public function editstatus_study($id){

    		$meet = study::findOrFail($id);

    		return view('frontend.user.status.editstatus_study', compact('meet'));
    	}


    	public function updatestatus_study(Request $request, $id){


            	study::find($id)->update($request->all());

        return redirect()->route('frontend.user.showstudy')->withFlashSuccess(trans('status update has been successfull'));



    		}




		 public function showengagement(){
		 		$id =  auth()->user()->id;
		 		$engage = DB::table('engagements')->where('deleted','=',0)->where('user_id','=',$id)->get();



			return view('frontend.user.showengagement')->with('engage',$engage);


		}

		public function delengage($id){

				$page = engagement::find($id);

			// Make sure you've got the Page model
			if($page) {
			    $page->deleted = 1;
			    $page->save();
				}

				return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Engagement Plan deleted'));

		}


		public function editengage($id) {

	       $study = engagement::findOrFail($id);

	    return view('frontend.user.engagementedit', compact('study'));
		}

		//UPDATE STUDY
		public function updateengage(Request $request, $id){

        	engagement::find($id)->update($request->all());


        return redirect()->route('frontend.user.showengage')->withFlashSuccess(trans('update has been successfull'));


    }


    public function save_publication( Request $request){

    	$input =   $request->all();
			$id =  auth()->user()->id;
 //print_r($input);exit;
			$data = array(

			  'title'=>$input['title'],
			  'citation'=>$input['citation'],
			  'journal'=>$input['journal'],
			  'date'   =>$input['date'],
			  'volume' =>$input['volume'],
			  'issue'  =>$input['issue'],
			   'pages' =>$input['pages'],
			   'status'=>$input['status'],
			 /// 'pub_type'=>$input['pub_type'],
			  'user_id'=>$id,

				);


 		      publication::insert($data);


 		      return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Publication saved successfully'));

    }

    public function showpublish(){

    		$id =  auth()->user()->id;
		 		$publish = DB::table('publications')->where('deleted','=',0)->where('user_id','=',$id)->get();


       return view('frontend.user.showpublish')->with('publish',$publish);

    }

        public function schools_visit( Request $request){

    	$input =   $request->all();
			$id =  auth()->user()->id;

			$data = array(

			  'school'=>$input['school'],
			  'dist'=>$input['dist'],
			  'comment'=>$input['comment'],
			  'user_id'=>$id,

				);


 		     school_visit::insert($data);


 		      return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans(' visit  has been saved'));

    }

     public function supervised_students( Request $request){

    	$input =   $request->all();
			$id =  auth()->user()->id;

			$data = array(

			  'fname'=>$input['fname'],
			  'lname'=>$input['lname'],
			  'course'=>$input['course'],
			  'institution'=>$input['institution'],
			  'level'=>$input['level'],
			  'user_id'=>$id,

				);


 		     supervised_student::insert($data);


 		      return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans(' Student has been added successfully'));

    }

     public function research_prog( Request $request){

    	$input =   $request->all();
			$id =  auth()->user()->id;

			$data = array(

			  'prog_name'=>$input['prog_name'],
			  'role'=>$input['role'],
			  'institute'=>$input['institute'],
			  'comment'=>$input['comment'],
			  'user_id'=>$id,

				);


 		     research_prog::insert($data);


 		      return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans(' research project  has been saved'));

    }

    public function confrence( Request $request){

    	$input =   $request->all();
			$id =  auth()->user()->id;

			$data = array(

			  'conference_name'=>$input['conference_name'],
			  'role'=>$input['role'],
			  'venue'=>$input['venue'],
			  'date'=>$input['date'],
			  'comment'=>$input['comment'],
			  'user_id'=>$id,

				);


 		     conference::insert($data);


 		      return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans(' conference was saved successfully'));

    }

		public function moment(Request $request){

				$input =   $request->all();
			$id =  auth()->user()->id;
				$data = array(
					'name'=>$input['name'],
					'date'=>$input['date'],
					'comment'=>$input['comment'],
					'user_id'=>$id,
				);

				moment::insert($data);

				return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('goal has been saved'));
		}


		public function visit_plan(Request $request){
				$input = $request->all();
				$id =  auth()->user()->id;
				
				$data = array(
					'title'=>$input['title'],
					'institution'=>$input['institution'],
					'date_from'=>$input['date_from'],
					'date_to'=>$input['date_to'],
					'user_id'=>$id,
				);

				visit::insert($data);

			return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('Visit has been set successfully'));
		}

		public function showsupervised(){

				$id =  auth()->user()->id;
		 		$sup = DB::table('supervised_students')
		 						  	->where('deleted','=',0)
		 						  	->where('user_id','=',$id)
		 			                ->get();

			//print_r($meet);exit;

			return view('frontend.user.showsupervised')->with('sup',$sup);

		}

	}
