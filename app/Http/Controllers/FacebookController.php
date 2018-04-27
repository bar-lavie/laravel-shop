<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facebook_user;
use Session;
use Socialite;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();
        $find_user = Facebook_user::Where('email', '=', $user->email)->first();

        if ($find_user) {
            // $userToken = Socialite::driver('facebook')->userFromToken($find_user->fbToken);
            Facebook_user::verifyFacebookUser($user);
            return redirect('/');
        } else {
            //    Facebook_user::verifyFacebookUser($user);
            Facebook_user::save_new_facebook($user);
            //   Session::flash('sm', 'ברוך הבא, ' . $user->name);
            return redirect('/');
        }
    }
}
