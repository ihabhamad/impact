@extends('admin.template.master')
@section('content-header')
    <h1>
        Dashboard
        <small>Applications</small>
    </h1>
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('/admin/Application')}}"><i class="active"></i> Applications</a></li>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-2">
            <a href="{{route('application.create')}}" class="btn btn-success btn-block margin-bottom">Add Application</a>

        </div>
        <div class="col-md-12">
            @include('admin.info')
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Applications</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>
                            <th>Title</th>
                            <th>created at</th>
                            <th>updated at</th>
                            <th>deleted_at</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach($Applications as $Application)
                            @if($Application->trashed())
                                <tr class="danger">
                            @else
                                <tr>
                                    @endif


                                    <td>{{$Application->title}}</td>
                                    <td>{{$Application->created_at}} </td>
                                    <td>{{$Application->updated_at}} </td>
                                    <td>{{$Application->deleted_at}} </td>
                                    <td><a class="btn btn-success" href="{{route('application.show',$Application->id)}}">view content</a></td>

                                    <td>
                                        @if(!$Application->trashed())
                                            <a href="#" class="btn btn-danger btn-block margin-bottom"
                                               onclick="event.preventDefault();
                                                       document.getElementById('delete-form{{$Application->id}}').submit();">
                                                Delete</a>
                                            <form id="delete-form{{$Application->id}}"
                                                  action="{{ route('application.destroy',$Application->id) }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                            </form>
                                        @else
                                            <a href="#" class="btn btn-danger btn-block margin-bottom"
                                               onclick="event.preventDefault();
                                                       document.getElementById('remove-form{{$Application->id}}').submit();">
                                                Force Delete </a>
                                            <form id="remove-form{{$Application->id}}"
                                                  action="{{ route('application.destroyforce',$Application->id) }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$Application->trashed())<a href="{{route('application.edit',$Application->id)}}
                                                " class="btn btn-warning btn-block margin-bottom">Edit</a>
                                        @else
                                            <a href="#" class="btn btn-success btn-block margin-bottom"
                                               onclick="event.preventDefault();
                                                       document.getElementById('restore-form{{$Application->id}}').submit();">
                                                Restore </a>
                                            <form id="restore-form{{$Application->id}}"
                                                  action="{{ route('application.restore',$Application->id) }}" method="POST"
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
