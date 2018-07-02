@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>experiances</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/experiance')}}"> experiances</a></li>
                    <li><a href="{{url('/admin/experiance/create')}}"><i class="active"></i> New experiance</a></li>
                    
        @endsection

@section('content')

      <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form"  role="form" method="POST" action="{{ route('experiance.store') }}" >
                  {!! csrf_field() !!}
		            
                  <div class="box-body">
                    @include('admin.errors')
                    @include('admin.info')
                    <div class="form-group">
                      <label for="experiance_name">Experiance Name</label>
                      <input type="text" name="experiance_name" class="form-control" value="{{old('experiance_name')}}" id="experiance_name" placeholder="Enter Experiance Name">

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{{url('/admin/experiance')}}" class="btn btn-default pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary ">Save</button>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection