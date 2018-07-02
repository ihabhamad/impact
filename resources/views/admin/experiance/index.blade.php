@extends('admin.template.master')
@section('content-header')
    <h1>
        Dashboard
        <small>experiances</small>
    </h1>
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('/admin/experiance')}}"><i class="active"></i> experiances</a></li>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-2">
            <a href="{{route('experiance.create')}}" class="btn btn-success btn-block margin-bottom">Add Experiance</a>

        </div>
        <div class="col-md-12">
            @include('admin.info')
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">experiances</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>

                            <th>experiance</th>
                            <th></th>
                            <th></th>

                        </tr>

                        @foreach($experiances as $experiance)
                            @if($experiance->trashed())
                                <tr class="danger">
                            @else
                                <tr>
                                    @endif


                                    <td>{{$experiance->experiance}}</td>

                                    <td>
                                        @if(!$experiance->trashed())
                                            <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('delete-form{{$experiance->id}}').submit();"> Delete</a>
                                            <form id="delete-form{{$experiance->id}}" action="{{ route('experiance.destroy',$experiance->id) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                            </form>
                                        @else
                                            <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('fdelete-form{{$experiance->id}}').submit();"> Force Delete </a>
                                            <form id="fdelete-form{{$experiance->id}}" action="{{ route('experiance.destroyforce',$experiance->id) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$experiance->trashed())<a href="{{route('experiance.edit',$experiance->id)}}
                                                " class="btn btn-warning btn-block margin-bottom">Update</a>
                                        @else
                                            <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('rostore-form{{$experiance->id}}').submit();"> Restore </a>
                                            <form id="rostore-form{{$experiance->id}}" action="{{ route('experiance.restore',$experiance->id) }}" method="POST" style="display: none;">
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