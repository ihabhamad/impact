@extends('admin.template.master')
@section('content-header')
    <h1>
        Dashboard
        <small>Posts</small>
    </h1>
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('post.index')}}"> Posts</a></li>
    <li><a href="{{route('post.edit',$post->id)}}"><i class="active"></i> edit Post</a></li>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Post</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" enctype="multipart/form-data" role="form" method="POST" action="{{ route('post.update',$post->id) }}" >
                    {!! csrf_field() !!}

                    <div class="box-body">
                        @include('admin.errors')
                        @include('admin.info')
                        <div class="form-group">
                            <label for="title">English Title</label>
                            <input type="text" name="title" class="form-control" value="{{$post->title}}" id="title" placeholder="Title ">
                        </div>

                        <div class="form-group">
                            <label for="content">English Content</label>
                            <textarea type="text" id="editor1"  rows="10" cols="80" name="content" class="form-control"  id="content" placeholder="Content<">{{$post->content}}</textarea>

                        </div>
                        <div class="form-group">
                            <label>Post Type</label>
                            <select class="form-control" name="post_type">
                                <option value="header" @if($post->post_type == "header") selected @endif >Header</option>
                                <option value="our" @if($post->post_type == "our") selected @endif >Our Work</option>
                                <option value="event" @if($post->post_type == "event") selected @endif >Event</option>
                                <option value="page" @if($post->post_type == "page") selected @endif >page</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_image">Post image</label>
                            <input type="file" id="post_image" name="image">
                            <p class="help-block">image suported png,jpej or jpg,gif</p>
                        </div>


                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{route('post.index')}}" class="btn btn-default pull-right">Cancel</a>
                        <button type="submit" class="btn btn-primary ">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
