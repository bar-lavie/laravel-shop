<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Session;

class UserController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('usersigned', ['except' => ['logout']]); //for user profile, user settings and etc. make more exceptions
    }

    public function postSignin(SigninRequest $request)
    {
        if (User::verifyUser($request)) {
            return redirect()->back();
        } else {
            //return view('content.home', self::$data)->withErrors('אימייל או סיסמה שגויים');
            return redirect()->back()->withErrors('אימייל או סיסמה שגויים');
        }
    }

    public function postSignup(SignupRequest $request)
    {
        User::save_new($request);
        return redirect('');
    }

    public function logout()
    {
        Session::forget('user_id');
        Session::forget('user_name');
        Session::forget('is_admin');
        return redirect('');
    }
}
