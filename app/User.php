<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Hash;
use Session;

class User extends Model
{
    public static function verifyUser($request)
    {
        $valid = false;

        $sql = " SELECT * FROM users u"
                . " JOIN users_roles r ON u.id=r.uid"
                . " WHERE u.email = ?";
        $user = DB::select($sql, [$request['email']]);

        if ($user) {
            $user = $user[0];

            if (Hash::check($request['password'], $user->password)) {
                $valid = true;
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->name);
                Session::flash('sm', 'ברוך שובך, ' . $user->name);


                if ($user->role == 3) {
                    Session::put('is_admin', true);
                    Session::flash('sm', 'ברוך שובך, ' . $user->name);
                }
            }
        }

        return $valid;
    }

    public static function save_new($request)
    {
        $user = new self(); // self is better if we want to cahnge class name!
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $uid = $user->id;
        $sql = "INSERT INTO users_roles VALUES ($uid, 4)";
        DB::insert($sql);
        Session::flash('sm', 'החשבון נוצר בהצלחה! יש להתחבר עם הפרטים שהזנת');
    }
}
