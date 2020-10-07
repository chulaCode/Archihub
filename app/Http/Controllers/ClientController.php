<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\jobs;
use App\clients;
use App\profiles;
use App\images;
use Image;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['client','verified']);
    }

    public function index(Request $request)
    {  
        $id=auth()->user()->id;
        $draft=jobs::where('user_id',$id)->get();
        //dd($draft);
        return view("client.client", compact('draft'));
    }
    public function applications()
    {
        $applicants=jobs::has('users')->where('user_id',auth()->user()
        ->id)->paginate(7);
        return view('job.applicant',compact('applicants'));  
    }
    public function postJob(Request $request)
    {
        return view("client.PostJob");
    }
    public function profile(Request $request)
    {
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        return view("client.profile",compact('user'));
    }  
    public function delete(Request $request){

        $id=$request->get('id');
        $job=jobs::findOrFail($id);
        $job->delete();
        return redirect()->back()->with('message','Job deleted successfully!');
    }
    public function edit(Request $request){
        $this->validate($request,[
            'title'=>'required','string', 'max:255',
            'categories_id'=>'required',
            'desc'=>'required','string','min:50',
            'preference'=>'required',
            'experience'=>'required',
            'duration'=>'required',
            'salary'=>'required',
            'last_date' => 'required|date|after:today'
            
        ]);
        $id=request('id');
        $user_id=auth()->user()->id;
        //dd($id);
        jobs::where('id',$id)->update([
            'user_id'=>$user_id,
            'title'=>request('title'),
            'categories_id'=>request('categories_id'),
            'description'=>request('desc'),
            'preference'=>request('preference'),
            'experience'=>request('experience'),
            'salary'=>request('salary'),
            'last_date'=>request('last_date')   
         ]);
         return redirect()->route("client.index")->with('message','Job updated
         successfully');
    }
    public function search(Request $request){
         $architect=User::where('user_type','!=','client')->with('profile')->paginate(8);
        return view('client.search',compact('architect'));

    }
    public function show($id, $name){
        $user=User::findOrFail($id);
        $user_id=auth()->user()->id;
        $image=images::where('user_id',$id)->get();
        $job=jobs::where('user_id',$user_id)->get();
        return view('client.show',compact('user','image','job'));
        
    }
    public function agency(Request $request)
    {
        $architect=User::where('user_type','agency')->paginate(8);
        return view('client.search',compact('architect'));
    }
    public function architect(Request $request)
    {
        $architect=User::where('user_type','architect')->paginate(8);
        return view('client.search',compact('architect'));
    }
    public function find(Request $request)
    {
        $search = $request->get('search');
        //dd($search);
        $architect=User::where('username','LIKE','%'.$search.'%')
        ->orWhere('name','LIKE','%'.$search.'%')->paginate(8);
        return view('client.search',compact('architect'));
    }
    public function interior(Request $request)
    {
        $search = $request->get('interior');
        $architect=profiles::where('job_field','LIKE','%'.$search.'%')->paginate(8);
        return view('client.search',compact('architect'));
    }
    public function commercial(Request $request)
    {
        $search = $request->get('commercial');
        $architect=profiles::where('job_field','LIKE','%'.$search.'%')->paginate(8);
        return view('client.search',compact('architect'));
    }
    public function urban(Request $request)
    {
        $search = $request->get('urban');
        $architect=profiles::where('job_field','LIKE','%'.$search.'%')->paginate(8);
        return view('client.search',compact('architect'));
    }
    public function industrial(Request $request)
    {
        $search = $request->get('industrial');
        $architect=profiles::where('job_field','LIKE','%'.$search.'%')->paginate(8);
        return view('client.search',compact('architect'));
    }
    public function landscape(Request $request)
    {
        $search = $request->get('landscape');
        $architect=profiles::where('job_field','LIKE','%'.$search.'%')->paginate(8);
        return view('client.search',compact('architect'));
    }
    public function email(Request $request)
    {
        $this->validate($request,[
    		'email'=>'required|email',
    		'message'=>'required',
    	]);

    	$homeUrl = url('/');
    	$jobId = $request->get('job_title');
    	$jobSlug = $request->get('job');

    	$jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;

    	$data = array(
    		'your_name'=>$request->get('your_name'),

    		'your_email'=>$request->get('your_email'),

    		'friend_name'=>$request->get('friend_name'),
    		'jobUrl'=>$jobUrl
			);

    	$emailTo = $request->get('friend_email');
    	try{
    		Mail::to($emailTo)->send(new SendJob($data));
    		return redirect()->back()->with('message','Job link sent to '.$emailTo);

    	}catch(\Exception $e){
    		return redirect()->back()->with('err_message','Sorry, Something went wrong.Please try later');

      }
    }
}
