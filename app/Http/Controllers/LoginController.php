<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Hash;
use Mail;
use Session;
use DB;
use Auth;


class LoginController extends Controller
{
    public function register(){
        return view('admin.registration');
    }

    public function register_save(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:cruds',
            'password'=>'required',
        ],
    [
        'name.required'=>"This fiels can not be blank.",
        'email.required'=>"Email Field is can not be null",
        'password.required'=>"Password Field is mendatory"
    ]);

       $student=new User();
       $student->name=$req->name;
       $student->email=$req->email;
       $student->password=Hash::make($req->password);
       $student->save();

       $data=['name'=>"Vishal",'data'=>"Hello Vishal"];
       $user['to']='vivekshukla21698mzp@gmail.com';
          Mail::send('admin.mail',$data,function($messages) use ($user){
           $messages->to($user['to']);
           $messages->subject('Hello Dev');
           return "Email have been sent to you!";
          });
       if($student){
        return back()->with('success','You have Successfully Registered, Check Your Mail to Login!');
       }
       else{
        return back()->with('fail','Something Went Wrong!');
       }
    }

    public function login(){
        return view('admin.login');
    }

    public function login_save(Request $req){
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ],
    [
        'email.required'=>'Enter only Registered Number',
    ]);

    $student=User::where('email','=',$req->email)->first();
    if($student){
        if(Hash::check($req->password,$student->password)){
            $req->session()->put('student',$student);
            return redirect('/dashboard');
        }else{
        return back()->with('fail','Password does not Matches!');
       }
    }
    else{
        return back()->with('fail','The Email is not Registered!');
    }
    }

    
    public function dashboard(){
        return view('crud.dashboard');
    }

    public function logout(){
        if (Session::has('student')){
            Session::pull('student');
            return redirect('/login');
        }
    }

    public function reset_password(){
        return view('admin.reset');
    }


    public function reset_password_submit(Request $req){

        $req->validate([
            'email'=>'required|email|exists:users'
        ]);

        $token=Str::random(64);

         DB::table('password_reset_tokens')->insert([
            'email'=>$req->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
         ]);

         Mail::send('admin.mailreset',['token'=>$token], function($message) use($req){
            $message->to($req->email);
            $message->subject('Reset Password');
         });
         return back()->with('success','We have mailed you,your password reset link');
    }

    public function reset_form($token){
        return view('admin.resetform',['token'=>$token]);
   }


   public function reset_submit(Request $req){
    $req->validate([
        'email'=>'required|email|exists:users',
        'password'=>'required|string|min:1|confirmed',
        'password_confirmation'=>'required'
    ]);

    $updatePassword=DB::table('password_reset_tokens')
    ->where('email',$req->email)
    ->where('token',$req->token)
    ->first();

    if(!$updatePassword){
         return back()->with('fail','Something went wrong!');
    }
    $user=User::where('email',$req->email)->update(['password'=>Hash::make($req->password)]);

    DB::table('password_reset_tokens')->where('email',$req->email)->delete();
    return redirect('/login')->with('success','Your Password has been changed!');
}


    public function change_password(){
        return view('admin.changepassword');
    }

    public function changepassword_submit(Request $req){
        $req->validate([
            'password'=>['required','string','min:8'],
            'newpassword'=>['required','string','min:8','confirmed'],
        ]);
        $currentuser=auth()->user();
        dd($currentuser);
        $currentpasswordstatus=Hash::check($req->password,auth()->user()->newpassword);
        if($currentpasswordstatus){
            User::findOrfail(Auth::user()->id)->update([
                'name'=>$req->name,
                'newpassword'=>Hash::make($req->newpassword),
            ]);
            return redirect()->back()->with('success','Password Updated Successfully!');
        }
        else{
            return redirect()->back()->with('fail','Current Password doesn not match with old password!'); 
        }
    }
}
