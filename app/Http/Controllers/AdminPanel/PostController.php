<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withTrashed()->get();
        return view('admin.posts.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.new');
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
            "title" =>   "required|unique:posts,title|max:150",
            "content" => "required|min:20",
            "post_type" => "required",
            "image"      =>  "image:memes:jpeg,png,gif,jpg:max:1024"
        ]);
        if($request->hasFile('image')){
            $image_name = str_random(20).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/posts'),$image_name);
        }else{
            $image_name = NULL;
        }
        $post = new Post;
        $post->title = $request->title;
        /** @var TYPE_NAME $post */
        $post->content = $request->content;
        $post->post_type = $request->post_type;
        $post->slug =  str_slug($request->title);
        $post->image = $image_name;
        $post->save();
        return redirect(route('post.index'))->with('message','your post has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit',compact('post'));
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
            "post_type" => "required",
            "image"      =>  "image:memes:jpeg,png,gif,jpg:max:1024"
        ]);
        $post = Post::find($id);
        if($request->hasFile('image')){
            $image_name = str_random(20).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/posts'),$image_name);
            if($post->image != NULL){
                if(file_exists( public_path('uploads/posts/').$post->image))
                {
                    unlink(public_path('uploads/posts/').$post->image);
                }
            }
        }else{
            $image_name = $post->image;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->post_type = $request->post_type;
        $post->slug =  str_slug($request->title);
        $post->image = $image_name;
        $post->save();
        return redirect(route('post.index'))->with('message','your post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect()->back()->with('message','post has been Trashed.');
    }
    public function destroy($id)
    {
        $post = Post::onlyTrashed()->find($id);
        if($post->image != NULL){
            if(file_exists( public_path('uploads/posts/').$post->image))
            {
                unlink(public_path('uploads/posts/').$post->image);
            }
        }
        $post->forceDelete();
        return redirect()->back()->with('message','post has been Removed.');
    }
    public function restore($id)
    {
        Post::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('message','post has been restored successfully.');
    }
}
