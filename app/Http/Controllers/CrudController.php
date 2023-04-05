<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Hash;
use File;

class CrudController extends Controller
{
    public function add_user(){
        return view('crud.create');
    }

    public function user_save(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:cruds',
            'password'=>'required',
            'image'=>'required',
            'message'=>'required|min:10|max:80'
        ],
    [
        'name.required'=>"Username is required",
        'email.required'=>"Email firld can not be null",
        'password.required'=>"Password field is mendatory",
        'image.required'=>"Image is required",
        'message.required'=>"Message field minimum & max length is 10 & 20 character",
    ]);

    $member=new Crud;
        $member->name=$req->name;
        $member->email=$req->email;
        $member->password= Hash::make($req->password);
        $member->message=$req->message;
        //Adding an Image:
        if($req->hasfile('image')){
            $file=$req->file('image');
            $extenstion=$file->getClientOriginalExtension();
            $filename=time().'.'.$extenstion;
            $file->move('public/img/',$filename);
        $member->image=$filename;   
        }
        $member->save(); 
        if($member){
            return back()->with('success','You have added student successfully!');
        }
        else{
            return back()->with('fail','Something Went Wrong!');
        }
    }

    public function dashboard(){
        $member=Crud::all();
        return view('crud.dashboard',['members'=>$member]);
    }

    public function delete_user($id){
        $member=Crud::find($id);
        $member->delete();
        if($member){
            return back()->with('success','You have deleted student successfully!');
        }
        else{
            return back()->with('fail','Something Went Wrong!');
        }
    }

    public function edit_user($id){
        $member=Crud::find($id);
        return view('crud.edit',['members'=>$member]);
    }

    public function update_user(Request $req){
        $update=Crud::find($req->id);
        $update->name=$req->name;
        $update->email=$req->email;
        $update->message=$req->message;
        $update->password=Hash::make($req->password);
        //Updating File/Image:
        if($req->hasfile('image')){
            $destination='uploads/product/'.$update->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$req->file('image');
            $extenstion=$file->getClientOriginalExtension();
            $filename=time().'.'.$extenstion;
            $file->move('public/img/',$filename);
            $update->image=$filename;
        }
        $update->update();
        if($update){
            return back()->with('success','You have updated student successfully!');
        }
        else{
            return back()->with('fail','Something Went Wrong!');
        }
}
}
