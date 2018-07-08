<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;

class SettingsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function store(Request $request)
    {

        $this->validate(request() , [
            "image"      =>  "image:memes:jpeg,png,gif,jpg:max:1024"
        ]);

        if($request->hasFile('image')){
            $image_name = str_random(20).'.'.$request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path('uploads/logo'),$image_name);

        }else{
            $image_name = NULL;
        }

        $set = new Settings;


        $set->image = $image_name;
        $set->save();

        return redirect(route('post.index'))->with('message','your Logo had been set ');

    }


    public function index()
    {
         $logo = Settings::get();
        return view('admin.settings.settings' , compact('logo'));
    }
}
