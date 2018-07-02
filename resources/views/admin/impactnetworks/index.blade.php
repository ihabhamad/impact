@extends('admin.template.master')
@section('content-header')
    <h1>
        Dashboard
        <small>impact networks</small>
    </h1>
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('/admin/impactnetwork')}}"><i class="active"></i> impact networks</a></li>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-2">
            <a href="{{route('impactnetwork.create')}}" class="btn btn-success btn-block margin-bottom">Add impact network</a>

        </div>
        <div class="col-md-12">
            @include('admin.info')
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">impact networks</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>

                            <th>Full Name</th>
                            <th>Current Position</th>
                            <th>Experiances</th>
                            <th>Guidances</th>
                            <th>Currently based_on</th>

                            <th></th>
                            <th></th>

                        </tr>

                        @foreach($impactnetworks as $impactnetwork)
                            @if($impactnetwork->trashed())
                                <tr class="danger">
                            @else
                                <tr>
                                    @endif


                                    <td>{{$impactnetwork->Full_Name}}</td>
                                    <td>{{$impactnetwork->Current_Position}}</td>
                                    <td>
                                        @foreach($impactnetwork->experiances as $experiance)
                                            {{$experiance->experiance}},
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($impactnetwork->guidances as $guidance)
                                            {{$guidance->guidance}},
                                        @endforeach
                                    </td>
                                    <td>{{$impactnetwork->Currently_based_on}}</td>


                                    <td>
                                        @if(!$impactnetwork->trashed())
                                            <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('delete-form{{$impactnetwork->id}}').submit();"> Delete</a>
                                            <form id="delete-form{{$impactnetwork->id}}" action="{{ route('impactnetwork.destroy',$impactnetwork->id) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                            </form>
                                        @else
                                            <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('fdelete-form{{$impactnetwork->id}}').submit();"> Force Delete </a>
                                            <form id="fdelete-form{{$impactnetwork->id}}" action="{{ route('impactnetwork.destroyforce',$impactnetwork->id) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$impactnetwork->trashed())<a href="{{route('impactnetwork.edit',$impactnetwork->id)}}
                                                " class="btn btn-warning btn-block margin-bottom">Update</a>
                                        @else
                                            <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('rostore-form{{$impactnetwork->id}}').submit();"> Restore </a>
                                            <form id="rostore-form{{$impactnetwork->id}}" action="{{ route('impactnetwork.restore',$impactnetwork->id) }}" method="POST" style="display: none;">
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