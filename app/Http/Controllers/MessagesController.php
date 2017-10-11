<?php

namespace App\Http\Controllers;
use App\Models\Access\User\User;
use Mail;
//use App\User;
use Storage;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
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
use App\Models\Access\User\supervision;


class MessagesController extends Controller 
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        //$currentUserId = Auth::user()->id;
        //$currentUserId = 1;
        $currentUserId=access()->id();

        // All threads, ignore deleted/archived participants
       // $threads = Thread::getAllLatest()->get();
        //$threads = Thread::forUser(1);
        // All threads that user is participating in
         $threads = Thread::forUser($currentUserId)->latest('updated_at')->paginate(5);

        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();

        return view('messenger.index', compact('threads', 'currentUserId'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id) 
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect('messages');
        }

        // show current user in list if not a current participant
         $id_log = Auth::user()->id;

      //  $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        $users = DB::select(DB::raw("SELECT * from users,supervisions where supervisions.user_id = $id_log AND supervisions.supervised_by_id =  users.id")); 

       // print_r($users);exit;

        // don't show the current user in list
        $userId = Auth::user()->id;
       /// $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

       /// $thread->markAsRead($userId);
        $file_link = DB::table('messages')->select('file')->where('user_id','=',$userId)->where('thread_id','=',$id)->get();
        //print_r($file_link);exit;
       
//
       /// return view('messenger.show', compact('thread', 'users'));
        if($thread->hasParticipant(Auth::id())){
            $thread->markAsRead($userId);
            return view('messenger.show', compact('thread','users','file_link'));
        }else{
            Session::flash('error_message', 'This conversation does not involve you');

            return redirect('messages');
    }
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
          $id_log = Auth::user()->id;

                 $users = DB::select(DB::raw("SELECT * from users,supervisions where supervisions.user_id = $id_log AND supervisions.supervised_by_id =  users.id")); 

                   

                      // print_r($users);exit;
      
        return view('messenger.create', compact('users')); 
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = Input::all();

       // print_r($input);exit;

        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );

        // Message

       $file = request()->file('file');
            //uploaded files if any processed here 
if (count($file) !== 0){
        $file = $request->file('file')->store('attached_files/'.Auth::user()->email);

    }else{


    }
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
                'file'      => $file
            ]
        );

        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );



        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);

          //  print_r( $input['recipients']);exit;
            //foward notification to reciepients 

            foreach ($input['recipients'] as $key) {
                
                $email_list = DB::table('users')->select('email')->where('id','=',$key)->get()->toArray();

                foreach ($email_list as $emails ) {
                    
            

                
               $mail = $emails->email;

               Mail::to($mail)->send(new reminder);

                }
              ///  
                
            }
       // exit;


           
        }

        

        return redirect('messages');
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */

    

    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect('messages');
        }

        $thread->activateAllParticipants();

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );

        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();

        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }

        return redirect('messages/' . $id); 
    }
}