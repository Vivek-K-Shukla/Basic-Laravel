<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;

class SocialAuthController extends Controller
{
    public function googleRedirect(){
        return Socialite::driver('google')->stateless()->user();
    }


    public function googleCallback(){
        $user =  Socialite::driver('google')->stateless()->user();;
        $this->createOrUpdateUser($user,'google');
        return redirect('/dashboard');
    }

    private function createOrUpdateUser($data,$provider){
        $user=User::where('email',$data->email)->first();

        if($user){
            $user->update([
                'provider'=>$provider,
                'provider_id'=>$data->id,
                'avatar'=>$data->avatar
            ]);
        }
                else{
                    $user=User::create([
                        'name'=>$data->name,
                        'email'=>$data->email,
                        'provider'=>$provider,
                        'provider_id'=>$data->id,
                        'avatar'=>$data->avatar 
                    ]);
                }
           Auth::login($user);
        }
    }
    
    
