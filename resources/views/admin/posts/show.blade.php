@extends('admin.template.master')
@section('content-header')
    <h1>
        Dashboard
        <small>Posts</small>
    </h1>
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('/admin/post')}}"><i class="active"></i> Posts</a></li>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-2">
            <a href="{{route('post.new')}}" class="btn btn-success btn-block margin-bottom">Add Post</a>

        </div>
        <div class="col-md-12">
            @include('admin.info')
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>created at</th>
                            <th>updated at</th>
                            <th>deleted_at</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach($posts as $post)
                            @if($post->trashed())
                                <tr class="danger">
                            @else
                                <tr>
                                    @endif


                                    <td>{{$post->title}}</td>
                                    <td>{{$post->post_type}}</td>
                                    <td>{{$post->created_at}} </td>
                                    <td>{{$post->updated_at}} </td>
                                    <td>{{$post->deleted_at}} </td>


                                    <td>
                                        @if(!$post->trashed())
                                            <a href="#" class="btn btn-danger btn-block margin-bottom"
                                               onclick="event.preventDefault();
                                                       document.getElementById('delete-form{{$post->id}}').submit();">
                                                Delete</a>
                                            <form id="delete-form{{$post->id}}"
                                                  action="{{ route('post.delete',$post->id) }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @else
                                            <a href="#" class="btn btn-danger btn-block margin-bottom"
                                               onclick="event.preventDefault();
                                                       document.getElementById('remove-form{{$post->id}}').submit();">
                                                Force Delete </a>
                                            <form id="remove-form{{$post->id}}"
                                                  action="{{ route('post.destroy',$post->id) }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$post->trashed())<a href="{{route('post.edit',$post->id)}}
                                                " class="btn btn-warning btn-block margin-bottom">Edit</a>
                                        @else
                                            <a href="#" class="btn btn-success btn-block margin-bottom"
                                               onclick="event.preventDefault();
                                                       document.getElementById('restore-form{{$post->id}}').submit();">
                                                Restore </a>
                                            <form id="restore-form{{$post->id}}"
                                                  action="{{ route('post.restore',$post->id) }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div>
    </div>

@endsection
