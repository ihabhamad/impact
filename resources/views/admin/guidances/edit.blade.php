@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>guidances</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/guidance')}}"> guidances</a></li>
                    <li><a href="{{url('/admin/guidance/'.$guidance->id.'/edit')}}"><i class="active"></i> Edit guidance</a></li>
                    
        @endsection

@section('content')

      <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add guidance</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form" method="POST" action="{{ route('guidance.update',$guidance->id) }}">
                  {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PUT" />

                  <div class="box-body">
                    @include('admin.errors')
                    @include('admin.info')
                    <div class="form-group">
                      <label for="guidance_name">guidance  Name</label>
                      <input type="text" name="guidance_name" class="form-control" value="{{$guidance->guidance}}" id="guidance_name">
                    </div>
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{{url('/admin/guidance')}}" class="btn btn-default pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary ">Save</button>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection