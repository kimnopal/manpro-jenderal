<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function google_login() {
        
        return Socialite::driver('google')->redirect();
    }

    public function google_auth() {
        try {
            $googleUser = Socialite::driver('google')->user();
            // \dd($googleUser);

            $user = User::where('email', $googleUser->email)->first();
            if ($user) {
                Auth::login($user);

                return \redirect('/');
            }
            else {
                $userData =  User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make(Str::random(16)),
                    
                ]);

                if ($userData) {
                    Auth::login($userData);

                    return \redirect('/');
                }
            }
        } 
        catch (Exception $e) {
            \dd($e);
        }
        
    }
}
