<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index(){
        $data=['name'=>"Vishal",'data'=>"Hello Vishal"];
        $user['to']='vivekshukla21698mzp@gmail.com';
           Mail::send('admin.mail',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Hello Dev');
            return "Email have been sent to you!";
           });
    }
}
