@extends('admin.template.master')
@section('content-header')
    <h1>
        Dashboard
        <small>Applications</small>
    </h1>
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('application.index')}}"> Applications</a></li>
    <li><a href="{{route('application.edit',$Application->id)}}"><i class="active"></i> edit Application</a></li>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Application</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" enctype="multipart/form-data" role="form" method="POST" action="{{ route('application.update',$Application->id) }}" >
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="box-body">
                        @include('admin.errors')
                        @include('admin.info')
                        <div class="form-group">
                            <label for="title">English Title</label>
                            <input type="text" name="title" class="form-control" value="{{$Application->title}}" id="title" placeholder="Application Title ">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea type="text" id="editor1"  rows="10" cols="80" name="content" class="form-control"  id="content" placeholder="English Content<">{{$Application->content}}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="Application_image">Application image</label>
                            <input type="file" id="Application_image" name="image">
                            <p class="help-block">image suported png,jpej or jpg,gif</p>
                        </div>


                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{route('application.index')}}" class="btn btn-default pull-right">Cancel</a>
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
