<?php

namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function ShowUsers()
    {
    	$users = User::withTrashed()->get();
		return View('admin.user.showUsers',compact('users'));
	}
	public function NewUser()
	{
		return view('admin.user.newusers');
	
	}
	public function NewUserStore(request $Request)
	{
		$this->validate(request(),[
                'name'  => 'required|unique:users,name|max:50',
                'email' => 'required|unique:users,email|max:255|email',
                'password' => 'required|min:6',
          ]);
         
         $new = new User;
         $new->name = $Request->name;
         $new->email = $Request->email;
         $new->password = Hash::make($Request->password);
         $new->approved = true;
         $new->save();
        return redirect()->back()->with('message','User has been added.');;
	}
	public function UserEdit($userId)
	{
		$user = User::find($userId);
		return View('admin.user.userEdit',compact('user'));
	}
	public function UserUpdate($userid,request $Request)
	{
		 $user = User::find($userid);
		 $user->name = $Request->name;
         $user->email = $Request->email;
         $user->save();
         return redirect()->back()->with('message','User [ '.$Request->name.' ] has been updated.');;
	}
    public function active_user($id)
    {
        $user = User::find($id);
        $user->approved = true;
        $user->save();
        return redirect()->back()->with('message','User has been activated.');;
    }
    public function deactivate_user($id)
    {
        $user = User::find($id);
        $user->approved = false;
        $user->save();
        return redirect()->back()->with('message','User has been deactivated.');;
    }
	public function UserDelete($userid)
	{
		$user = User::find($userid);
		$user->delete();
		return redirect()->back()->with('message','user has been Deleted.');
	}
	public function FroceDelete($userId){
		$user = User::onlyTrashed()->find($userId);
		$user->forceDelete();
		return redirect()->back()->with('message','user has been Force Deleted.');
	}
	public function restore($userId){
		$user = User::onlyTrashed()->find($userId);
		$user->restore();
		return redirect()->back()->with('message','User has been restored.');
	}
	public function PasswordForm($userId){
		$username = User::Where('id',$userId)->first()->name;
		return View('admin.user.repassuser')->with('userid',$userId)->with('username',$username);
	}
	public function PasswordUpdate($userId,request $Request)
	{	
		$this->validate(request(),[
                'password' => 'required|min:6|confirmed',
          ]);
		$password = Hash::make($Request->password);
		User::where('id', $userId)->update(['password' => $password]);
		return redirect('admin/users')->with('message','password has been reset successfully.');
	}
}
