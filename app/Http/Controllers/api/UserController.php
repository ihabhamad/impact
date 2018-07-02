<?php

namespace App\Http\Controllers\api;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Notification;
use App\Notifications\UserConnectImpactPerson;
Use App\Notifications\UserApproveApplication;

class UserController extends Controller
{
    //

    public function Register(Request $request)
    {

        dd($request);
        $v = validator($request->only('email', 'name', 'password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($v->fails()) {
            return response()->json($v->errors()->all(), 400);
        }
     $user = new User;
     $user->name = $request->name;
     $user->email = $request->email;
     $user->password = Hash::make($request->password);
     $user->save();
     return response()->json(['status','success'],200);
    }
    public function password_reset()
    {


    }
    public function ConnectToImpactPerson(){
        $data['name'] = "lorem tona";
        $data['email'] = "lorem tona@email";
        $data['impact_person'] = "salo palo";
        $data['impact_person_id'] = 1;
        $Admins = Admin::all();
        foreach ($Admins as $admin){
            Notification::send($admin, new UserConnectImpactPerson($data));
        }
        return response()->json(['status'=>'success'],200);
    }
    public function ApplyForApplication(){
        $data['name'] = "lorem tona";
        $data['email'] = "lorem tona@email";
        $data['app_name'] = "data protection";
        $data['app_id'] = 1;
        $Admins = Admin::all();
        foreach ($Admins as $admin) {
            Notification::send($admin, new UserApproveApplication($data));
        }
        return response()->json(['status'=>'success'],200);
    }
}
