<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\profiles;
use App\agents;
use App\images;
use App\jobs;
use App\categories;

use Auth;
use Image;


class ArchitechController extends Controller
{
    public function __construct()
    {
        $this->middleware(['architect','verified'],['except'=>array(
        'apply','savedJobs')]);
    }

    public function index(Request $request)
    {
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        $job=DB::table('jobs')->latest()->paginate(10);
       
        return view("architect.architect",compact('user','job'));
    }
    public function profile(Request $request)
    {
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        $image=images::where('user_id',$id)->get();
        return view("architect.profile",compact('user','image'));
    }

    public function storeProfile(Request $request)
    {
   
      $this->validate($request,[
            'bio'=>'required|min:20',
            'job_field'=>'required',
            'username' => ['required','string','max:255'],
        ]);
         $id=auth()->user()->id;

         profiles::where('user_id',$id)->update([
            'bio'=>request('bio'),
            'job_field'=>request('job_field'),     
        ]);
        User::where('id',$id)->update([
            'username'=>request('username'),
   
        ]);
        return redirect()->back()->with('message','Profile updated
        successfully');
        
    }

    public function personalDetail(Request $request)
    {
           $this->validate($request,[
            'phone'=>'required|min:11',
            'address'=>'required',
            'state'=>'required',
            'experience'=>'required',

        ]);
        //dd(request('phone'),request('address'),request('state'));
          $id=auth()->user()->id;
            profiles::where('user_id',$id)->update([
                'phone'=>request('phone'),
                'address'=>request('address'),
                'state'=>request('state'),
                'experience'=>request('experience'),
                  
            ]);
            
            return redirect()->back()->with('message','Profile updated
            successfully');

    }

    public function changePassword(Request $request)
    {
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        $email=request('email');
        $id=auth()->user()->id;
        $user=User::where([['email',$email],['id',$id]])->update([
            'password' => Hash::make(request('password')),
           
        ]);
        if($user)
            return redirect()->back()->with('message','password changed
            successfully');
        else
             return redirect()->back()->with('status','Email is not same as your email');

    }
    public function avatar(Request $request)
    {
        $this->validate($request,[
            'avatar'=>'required|mimes:png,jpeg,jpg|max:20000'
         ]);
        $user_id=auth()->user()->id;
        if($request->hasfile('avatar'))
        {
            $file=$request->file('avatar');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $img=Image::make($file)->resize(200,200);
            $img->save('uploads/avatar/'.$filename);
            profiles::where('user_id',$user_id)->update([
                'avatar'=>$filename
            ]);
            return redirect()->back()->with('message','Profile picture updated
            successfully');
        }

    }
  
    public function resume(Request $request)
    {
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,docx,odt|max:20000'
         ]);
       $user_id=auth()->user()->id;
       $resume=$request->file('resume')->store(
           'public/files');
       profiles::where('user_id',$user_id)->update([
           'resume'=>$resume
       ]);
       return redirect()->back()->with('message','Resume updated
       successfully');
        
    }
    public function coverLetter(Request $request)
    {
        $this->validate($request,[
            'coverLetter'=>'required|mimes:pdf,doc,docx,odt|max:20000'
         ]);
       $user_id=auth()->user()->id;
       $cover=$request->file('coverLetter')->store(
           'public/files');
       profiles::where('user_id',$user_id)->update([
           'cover_letter'=>$cover
       ]);
       return redirect()->back()->with('message','Cover letter updated
       successfully');
    }
    public function certificate(Request $request)
    {
        $this->validate($request,[
            'certificate'=>'required|mimes:pdf,doc,docx,odt|max:20000'
         ]);
       $user_id=auth()->user()->id;
       $certificate=$request->file('certificate')->store(
           'public/files');
       profiles::where('user_id',$user_id)->update([
           'certificate'=>$certificate
       ]);
       return redirect()->back()->with('message','Resume updated
       successfully');
        
    }
    public function storeImage(Request $request)
    {
        $this->validate($request,[
            'image'=>'required'
        ]);
        $user_id=auth()->user()->id;
       if($request->hasFile('image')){
           //looping through multiple image gotten from form
           foreach($request->file('image') as $image){
              // $path=$image->store('uploads','public');
             // $file = $request->file('image');
        
              $filename = time().'.'.$image->getClientOriginalExtension();
              $img=Image::make($image)->resize(1000,1000);
              $img->save('uploads/'.$filename);
                 images::create([
                    'user_id'=>$user_id,
                    'image'=> $filename
                ]);
           }
           
       }
       
       return redirect()->back()->with('message','Images uploaded
       successfully');
    }
    public function delete(Request $request)
    {
        $id=$request->get('id');
        $image=images::where('id',$id)->first;
        $filename = $image->image;
        $image->delete();
        \Storage::delete('public/'.$filename);
        return redirect()->back()->with('message','Image deleted successfully!');

    }
    public function show(Request $request)
    {
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
       $image=images::where('user_id',$id)->get();
        //$profile=Profiles::where('user_id',$id)->get();
        return view('architect.clientView',compact('user','image'));
    }
   
    public function find(Request $request)
    {
        $search = $request->get('search');
        $job=jobs::where('title','LIKE','%'.$search.'%')
        ->orWhere('preference','LIKE','%'.$search.'%')
        ->orWhere('experience','LIKE','%'.$search.'%')
        ->paginate(10);
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        return view('architect.architect',compact('job','user'));
    }
    public function detail($id, Request $request)
    {
        $job=jobs::where('id',$id)->first();
        $client=User::where('id',$job->user_id)->first();
        $cat=categories::where('id',$job->categories_id)->first();
        return view("architect.detail",compact('job','cat','client'));
    }
    public function savedJobs()
    {
        $job=Auth::user()->favorites;
        return view('architect.savejobs', compact('job'));

    }
    public function interior(Request $request)
    {
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        $job=jobs::where('categories_id',5)->paginate(8);
        return view('architect.architect',compact('job','user'));
    }
    public function commercial(Request $request)
    {   
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        $job=jobs::where('categories_id',6)->paginate(10);
        return view('architect.architect',compact('job','user'));
    }
    public function urban(Request $request)
    {
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        $job=jobs::where('categories_id',1)->paginate(10);
        return view('architect.architect',compact('job','user'));
    }
    public function industrial(Request $request)
    {
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        $job=jobs::where('categories_id',3)->paginate(10);
        return view('architect.architect',compact('job','user'));
    }
    public function landscape(Request $request)
    {
        $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        $job=jobs::where('categories_id',4)->paginate(10);
        return view('architect.architect',compact('job','user'));
    }
    public function residential(Request $request)
    {  
         $id=auth()->user()->id;
        $user=User::where('id',$id)->first();
        $job=jobs::where('categories_id',2)->paginate(10);
        return view('architect.architect',compact('job','user'));
    }
}
