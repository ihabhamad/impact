@extends('admin.template.master')
@section('content-header')
    <h1>
        Dashboard
        <small>guidances</small>
    </h1>
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('/admin/guidance')}}"><i class="active"></i> guidances</a></li>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-2">
            <a href="{{route('guidance.create')}}" class="btn btn-success btn-block margin-bottom">Add guidance</a>

        </div>
        <div class="col-md-12">
            @include('admin.info')
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">guidances</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>

                            <th>guidance</th>
                            <th></th>
                            <th></th>

                        </tr>

                        @foreach($guidances as $guidance)
                            @if($guidance->trashed())
                                <tr class="danger">
                            @else
                                <tr>
                                    @endif


                                    <td>{{$guidance->guidance}}</td>

                                    <td>
                                        @if(!$guidance->trashed())
                                            <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('delete-form{{$guidance->id}}').submit();"> Delete</a>
                                            <form id="delete-form{{$guidance->id}}" action="{{ route('guidance.destroy',$guidance->id) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                            </form>
                                        @else
                                            <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('fdelete-form{{$guidance->id}}').submit();"> Force Delete </a>
                                            <form id="fdelete-form{{$guidance->id}}" action="{{ route('guidance.destroyforce',$guidance->id) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$guidance->trashed())<a href="{{route('guidance.edit',$guidance->id)}}
                                                " class="btn btn-warning btn-block margin-bottom">Update</a>
                                        @else
                                            <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault();
                                                    document.getElementById('rostore-form{{$guidance->id}}').submit();"> Restore </a>
                                            <form id="rostore-form{{$guidance->id}}" action="{{ route('guidance.restore',$guidance->id) }}" method="POST" style="display: none;">
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