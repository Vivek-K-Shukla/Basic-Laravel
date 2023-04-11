<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class EloquentController extends Controller
{
    public function index(){
    // One-To-One Relationship:-
    // //     $user=User::with('contact')->first();
    // //     $contact=Contact::with('user')->first();
    // //     dd($user->toArray());


    // One-To-Many Relationship:-
    // //     $post=Post::with('user')->first();
    // //     $user=User::with(['contact','posts'])->find(1);
    // //    $post=Post::with('user')->first();
    // //    dd( $post->toArray() );

    
    // Many-To-Many Relationship:-
    // // $categories=Category::all();
    // // $post=Post::with('categories')->first();
    // // $post->categories()->attach($categories);
    // // dd($post->toArray());
    }
}
