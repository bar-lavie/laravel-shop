<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Content extends Model {

    static public function getContent($url, &$data) {

        $data['contents'] = [];

        if ($menu = Menu::where('url', '=', $url)->first()) {
            $menu = $menu->toArray();
            $data['title'] .= $menu['title'];
            if ($contents = Menu::find($menu['id'])->contents) {
                $data['contents'] = $contents->toArray();
            }
        }
    }

    static public function save_new($request) {
        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'התוכן נשמר בהצלחה');
    }

    static public function update_item($request, $id) {
        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'התוכן עודכן בהצלחה');
    }

}
