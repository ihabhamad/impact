<?php

namespace App\Http\Controllers\Front;

use App\Mail\contact_us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Admin;
use App\Application;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Extramenu;

class PublicController extends Controller
{
    //
    public function __construct()
    {
        $menus = Extramenu::all();
        $posts = Post::all();
        $applications = Application::all();
        View::share('menus', $menus);
        View::share('posts', $posts);
        View::share('applications', $applications);
    }
    public function index(){

        return view('frontend.pages.home');
    }
    public function page($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('frontend.pages.post',compact('post'));
    }
    public function application($slug)
    {
        $application= Application::where('slug',$slug)->firstOrFail();
        return view('frontend.pages.application',compact('application'));
    }

    public function contact_us_mail(Request $request){
        $this->validate($request,[
            'username'  => 'required|max:50|string',
            'email'     => 'required|email|max:150',
            'subject'   => 'required|max:150',
            'message'   => 'required',
        ]);
        $Admins = Admin::all();
        foreach ($Admins as $admin) {
            Mail::to($admin->email)->send(new contact_us($request));
        }
        return redirect()->back()->with('message_title','Thank You')->with('message','your message has been send to our site well be replay to you soon.');
    }

}
