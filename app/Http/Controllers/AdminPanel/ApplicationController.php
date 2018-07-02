<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('auth:admin');

    }
    
    public function index()
    {
        $Applications = Application::withTrashed()->get();
        return view('admin.applications.index',compact('Applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.applications.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate(request(),[
            "title" =>   "required|unique:Applications,title|max:150",
            "content" => "required|min:20",
            "image"      =>  "image:memes:jpeg,png,gif,jpg:max:1024"
        ]);
        if($request->hasFile('image')){
            $image_name = str_random(20).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/Applications'),$image_name);
        }else{
            $image_name = NULL;
        }
        $Application = new Application;
        $Application->title = $request->title;
        $Application->content = $request->content;
        $Application->slug =  str_slug($request->title);
        $Application->image = $image_name;
        $Application->save();
        return redirect(route('application.index'))->with('message','your Application has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Application = Application::find($id);
        return view('admin.applications.show',compact('Application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Application = Application::find($id);
        return view('admin.applications.edit',compact('Application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            "title" =>   "required|max:150",
            "content" => "required|min:20",
            "image"      =>  "image:memes:jpeg,png,gif,jpg:max:1024"
        ]);
        $Application = Application::find($id);
        if($request->hasFile('image')){
            $image_name = str_random(20).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/Applications'),$image_name);
            if($Application->image != NULL){
                if(file_exists( public_path('uploads/Applications/').$Application->image))
                {
                    unlink(public_path('uploads/Applications/').$Application->image);
                }
            }
        }else{
            $image_name = $Application->image;
        }

        $Application->title = $request->title;
        $Application->content = $request->content;
        $Application->image = $image_name;
        $Application->save();
        return redirect(route('application.index'))->with('message','your Application has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Application::find($id)->delete();
        return redirect()->back()->with('message','Application has been Trashed.');
    }
    public function froceDestroy($id)
    {
        $Application = Application::onlyTrashed()->find($id);
        if($Application->image != NULL){
            if(file_exists( public_path('uploads/Applications/').$Application->image))
            {
                unlink(public_path('uploads/Applications/').$Application->image);
            }
        }
        $Application->forceDelete();
        return redirect()->back()->with('message','Application has been Removed.');
    }
    public function restore($id)
    {
        Application::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('message','Application has been restored successfully.');
    }
}
