<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Mail;

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
            $req->session()->put('loginId',$student->id);
            return redirect('dashboard');
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
}
