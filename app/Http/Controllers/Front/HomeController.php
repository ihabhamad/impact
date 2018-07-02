<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Extramenu;
use App\Http\Controllers\Controller;
use App\ImpactNetwork;
use Notification;
use App\Admin;
use App\Notifications\UserConnectImpactPerson;
Use App\Notifications\UserApproveApplication;
use App\Post;
use App\Application;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Runner\Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $menus = Extramenu::all();
        $posts = Post::all();
        $applications = Application::all();
        View::share('menus', $menus);
        View::share('posts', $posts);
        View::share('applications', $applications);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.user');
    }
    public function impact(){
        $impacts = impactNetwork::with('experiances','guidances')->get();
        return view('frontend.pages.impact',compact('impacts')) ;
    }
    public function search($text,$order = 'asc'){

        $impact_name = ImpactNetwork::where('Full_Name','like','%'.$text.'%')->paginate(30);
        $impact_Position = ImpactNetwork::where('Current_Position','like','%'.$text.'%')->paginate(30);
        $impact_based_on = ImpactNetwork::where('Currently_based_on','like','%'.$text.'%')->paginate(30);
        $by_experiances  = ImpactNetwork::wherehas('experiances',function($query) use ($text){return $query->where('experiance','like','%'.$text.'%');})->paginate(30);
        $by_guidances  = ImpactNetwork::wherehas('guidances',function($query) use ($text){return $query->where('guidance','like','%'.$text.'%');})->paginate(30);

        $result_total = $impact_name->total() + $impact_Position->total() + $impact_based_on->total() + $by_experiances->total() + $by_guidances->total();
        $items = array_merge($impact_name->items(),$impact_Position->items(),$impact_based_on->items(),$by_experiances->items(),$by_guidances->items());
        $collection = collect($items)->unique();
        $current_page = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $Pagination = new \Illuminate\Pagination\LengthAwarePaginator($collection,$result_total,30,$current_page);
        return view('frontend.pages.impact')->with('impacts',$Pagination)->with('text',$text);
    }
    public function ConnectToImpactPerson(Request $request){
        $data['name'] = auth()->user()->name;
        $data['email'] = auth()->user()->email;
        $data['impact_person'] = $request->impact_name;
        $data['impact_person_id'] =  $request->impact_id;
        $Admins = Admin::all();
        foreach ($Admins as $admin){
            Notification::send($admin, new UserConnectImpactPerson($data));
        }
        return redirect()->back()->with('message','Admin well be connect to you for more information.');
    }
    public function ApplyForApplication(Request $request){
        $data['name'] = auth()->user()->name;
        $data['email'] = auth()->user()->email;
        $data['app_name'] = $request->app_name;;
        $data['app_id'] = $request->app_id;
        $Admins = Admin::all();
        foreach ($Admins as $admin) {
            Notification::send($admin, new UserApproveApplication($data));
        }
        return redirect()->back()->with('message','Admin well be connect to you for more information.');
    }

    public function EditUser()
    {
        return view('frontend.pages.user');
    }
    public function profileupdate(Request $request){
        $this->validate($request,[
            'fullname'  => 'required|max:50|string',
            'email'     => 'required|email|max:150',
            'password' => 'required|confirmed|min:6',
        ]);
        try{
            $user = auth()->user();
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        }
        catch (\Exception $e){
            return redirect()->back()->with('error','Please try again Something Wrong !!');
        }

        return redirect()->back()->with('message_title','Thank You')->with('message','Your profile has been updated.');
    }
}
