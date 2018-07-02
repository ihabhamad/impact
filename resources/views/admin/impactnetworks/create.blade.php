@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>impactnetworks</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/impactnetwork')}}"> impactnetworks</a></li>
                    <li><a href="{{url('/admin/impactnetwork/create')}}"><i class="active"></i> New impactnetwork</a></li>
                    
        @endsection

@section('content')

      <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form"  role="form" method="POST" action="{{ route('impactnetwork.store') }}" >
                  {!! csrf_field() !!}
		            
                  <div class="box-body">
                    @include('admin.errors')
                    @include('admin.info')
                    <div class="form-group">
                      <label for="Full_Name">Full Name</label>
                      <input type="text" name="Full_Name" class="form-control" value="{{old('Full_Name')}}" id="Full_Name" placeholder="Enter impact network Full Name">
                    </div>
                      <div class="form-group">
                          <label for="Current_Position">Current Position</label>
                          <input type="text" name="Current_Position" class="form-control" value="{{old('Current_Position')}}" id="Current_Position" placeholder="Enter Current Position">
                      </div>
                      <div class="form-group">
                          <label for="Currently_based_on">Currently based on</label>
                          <input type="text" name="Currently_based_on" class="form-control" value="{{old('Currently_based_on')}}" id="Currently_based_on" placeholder="Currently based on">
                      </div>
                      <div class="row">
                          <h3 class="text-center">Experiances</h3>
                          @foreach($experiances as $experiance)
                          <div class="col-lg-6">
                              <input type="checkbox" name="experiances[]" value="{{$experiance->id}}">
                              {{$experiance->experiance}}</div>
                          @endforeach
                      </div>
                      <div class="row">
                          <h3 class="text-center">Guidances</h3>
                          @foreach($guidances as $guidance)
                              <div class="col-lg-6">
                                  <input type="checkbox"  name="guidances[]" value="{{$guidance->id}}">
                                  {{$guidance->guidance}}</div>
                          @endforeach
                      </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{{url('/admin/impactnetwork')}}" class="btn btn-default pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary ">Save</button>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection