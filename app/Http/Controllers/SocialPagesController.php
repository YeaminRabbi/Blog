<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;
use Exception;

class SocialPagesController extends Controller
{
    //
    function loginWithGithub(){
        return Socialite::driver('github')->redirect();
    }
function GithubCallBack(){
        $user = Socialite::driver('github')
        ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
        ->user();

        if(User::where('email',$user->getEmail())->exists()){
            $get_user= User::where('email',$user->getEmail())->first();
            Auth::guard()->login($get_user,true); // Ami j authenticate hoye ashtesi oita O validate kortese
            return redirect()->to('/');
        }
        else{
            $create_user = User::create([
                'name'  =>  $user->getName(),
                'email' => $user->getEmail(),
                'provider' => 'github',
                'provider_id' => $user->getId()

            ]);
            // return $create_user;
            Auth::guard()->login($create_user,true);
            return redirect()->to('/');
        }
        
        // return $user->getId();
        
    }


    function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }
    
    function GoogleCallBack(){
        $user = Socialite::driver('google')
        ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
        ->user();

        if(User::where('email',$user->getEmail())->exists()){
            $get_user= User::where('email',$user->getEmail())->first();
            Auth::guard()->login($get_user,true); // Ami j authenticate hoye ashtesi oita O validate kortese
            return redirect()->to('/');
        }
        else{
            $create_user = User::create([
                'name'  =>  $user->getName(),
                'email' => $user->getEmail(),
                'provider' => 'google',
                'provider_id' => $user->getId()

            ]);
            Auth::guard()->login($create_user,true);
            return redirect()->to('/');
        }

        // return $user->getId();
    }



    // public function loginWithLinkedin()
    // {
    //     return Socialite::driver('linkedin')->redirect();
    // }
       

    // public function LinkedinCallBack()
    // {
        
    //     $user = Socialite::driver('linkedin')
    //     ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
    //     ->user();

    //     if(User::where('email',$user->getEmail())->exists()){
    //         $get_user= User::where('email',$user->getEmail())->first();
    //         Auth::guard()->login($get_user,true); // Ami j authenticate hoye ashtesi oita O validate kortese
    //         return redirect()->to('/');
    //     }
    //     else{
    //         $create_user = User::create([
    //             'name'  =>  $user->getName(),
    //             'email' => $user->getEmail(),
    //             'provider' => 'Linkedin',
    //             'provider_id' => $user->getId()

    //         ]);
    //         Auth::guard()->login($create_user,true);
    //         return redirect()->to('/');
    //     }

            

    // }


        // return $user->getId();
    


    // function loginWithFacebook(){
    //     return Socialite::driver('facebook')->redirect();
    // }
    // function FacebookCallBack(){
    //     $user = Socialite::driver('facebook')
    //     ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
    //     ->user();

    //     if(User::where('email',$user->getEmail())->exists()){
    //         $get_user= User::where('email',$user->getEmail())->first();
    //         Auth::guard()->login($get_user,true); // Ami j authenticate hoye ashtesi oita O validate kortese
    //         return redirect()->to('/');
    //     }
    //     else{
    //         $create_user = User::create([
    //             'name'  =>  $user->getName(),
    //             'email' => $user->getEmail(),
    //             'provider' => 'facebook',
    //             'provider_id' => $user->getId()

    //         ]);
    //         Auth::guard()->login($create_user,true);
    //         return redirect()->to('/');
    //     }
    // }
}