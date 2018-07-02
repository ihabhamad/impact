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
    <li><a href="{{route('application.show',$Application->id)}}"><i class="active"></i> show Application</a></li>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">show Application</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form"  >
                    {!! csrf_field() !!}

                    <div class="box-body">
                        @include('admin.errors')
                        @include('admin.info')
                        <div class="form-group">
                            <label for="title">English Title</label>
                            <input disabled type="text" name="title" class="form-control disabled" value="{{$Application->title}}" id="title" placeholder="Application Title ">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea disabled type="text" id="editor1"  rows="10" cols="80" name="content" class="form-control disabled"  id="content" placeholder="English Content<">{{$Application->content}}</textarea>

                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{route('application.index')}}" class="btn btn-default pull-right">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
