<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;
use Hash;
use App\Category;
use App\Extramenu;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	
        $this->middleware('auth:admin');
        
    }
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.dashboard');
    }
    public function adminManage()
    {
        $admins = Admin::where('id','!=',Auth::id())
               ->orderBy('id', 'desc')
               ->withTrashed()->get();
        return view('admin.admin.showAdmins',compact('admins'));
    }
    public function newAdmin()
    {
        return view('admin.admin.newadmins');
    }
    public function newAdminStore(request $Request)
    {
        $this->validate(request(),[
                'name'  => 'required|unique:admins,name|max:50',
                'email' => 'required|unique:admins,email|max:255|email',
                'password' => 'required|min:6',
          ]);
         
         $new = new Admin;
         $new->name = $Request->name;
         $new->email = $Request->email;
         $new->password = Hash::make($Request->password);
         $new->save();
        return redirect()->back()->with('message','admin has been added.');;
    }
    public function adminEdit($adminId)
    {
	     $admin = Admin::find($adminId);
		return View('admin.admin.adminEdit',compact('admin'));	
	}
	public function AdminUpdate($adminid,request $Request)
	{
		 $admin = Admin::find($adminid);
		 $admin->name = $Request->name;
         $admin->email = $Request->email;
         $admin->save();
         return redirect()->back()->with('message','admin [ '.$Request->name.' ] has been updated.');;
        
	}
	public function AdminDelete($adminid)
	{
		$admin = Admin::find($adminid);
		$admin->delete();
		return redirect()->back()->with('message','admin has been Deleted.');
	}
	public function ForceDelete($adminid)
	{
		$admin = Admin::onlyTrashed()->find($adminid);
		$admin->forceDelete();
		return redirect()->back()->with('message','admin has been Force Deleted.');
	}
	public function restore($adminid){
		$admin = Admin::onlyTrashed()->find($adminid);
		$admin->restore();
		return redirect()->back()->with('message','Admin has been restored.');
	}
	public function PasswordForm($adminId){
		$username = Admin::Where('id',$adminId)->first()->name;
		return View('admin.admin.repassadmin')->with('userid',$adminId)->with('username',$username);
	}
	public function PasswordUpdate($adminId,request $Request)
	{	
		$this->validate(request(),[
                'password' => 'required|min:6|confirmed',
          ]);
		$password = Hash::make($Request->password);
		Admin::where('id', $adminId)->update(['password' => $password]);
		return redirect('admin/admins')->with('message','password has been reset successfully.');
	}
}
