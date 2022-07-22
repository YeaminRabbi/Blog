<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LinkedinPagesController extends Controller
{
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }
       

    public function linkedinCallback()
    {
        
    }
}