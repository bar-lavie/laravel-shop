<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use Hash;
use Session;

class Facebook_user extends Model
{
    public static function verifyFacebookUser($request)
    {
        $valid = false;
        $sql = " SELECT * FROM facebook_users u"
                . " JOIN facebook_users_roles r ON u.id=r.uid"
                . " WHERE u.email = ?";
        $user = DB::select($sql, [$request->email]);
        if ($user) {
            $user = $user[0];
            //dd($user->password);
            if (Hash::check($request->id, $user->password)) {
                $valid = true;
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->name);
                Session::flash('sm', 'ברוך שובך, ' . $user->name);
            }
        }

        return $valid;
    }

    public static function save_new_facebook($request)
    {
        $user = new self(); // self is better if we want to cahnge class name!
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['id']);
        $user->provider_user_id = $request['id'];
        $user->save();
        $uid = $user->id;
        $sql = "INSERT INTO facebook_users_roles VALUES ($uid, 4)";
        DB::insert($sql);
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        Session::flash('sm', 'ברוך הבא, ' . $user->name);
    }
}
