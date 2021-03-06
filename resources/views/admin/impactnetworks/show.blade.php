@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>impact networks</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/impactnetwork')}}"> impact networks</a></li>
                    <li><a href="{{url('/admin/impactnetwork/'.$impactnetwork->id.'/show')}}"><i class="active"></i> show impact network Person</a></li>
                    
        @endsection

@section('content')

      <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">impact network Person</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form">


                  <div class="box-body">
                    @include('admin.errors')
                    @include('admin.info')
                      <div class="form-group">
                          <label for="Full_Name">Full Name</label>
                          <input disabled type="text" name="Full_Name" class="form-control disabled" value="{{$impactnetwork->Full_Name}}" id="Full_Name">
                      </div>
                      <div class="form-group">
                          <label for="Current_Position">Current Position</label>
                          <input disabled type="text" name="Current_Position" class="form-control disabled" value="{{$impactnetwork->Current_Position}}" id="Current_Position">
                      </div>
                      <div class="form-group">
                          <label for="Currently_based_on">Currently based on</label>
                          <input disabled type="text" name="Currently_based_on" class="form-control disabled" value="{{$impactnetwork->Currently_based_on}}" id="Currently_based_on">
                      </div>
                      <div class="row">
                          <h3 class="text-center">Experiances</h3>
                          @foreach($experiances as $experiance)
                              <div class="col-lg-6">
                                  <input class="disabled" type="checkbox" name="experiances[]"
                                         @foreach($impactnetwork->experiances as $Iexp)
                                                 @if($Iexp->id ==  $experiance->id)
                                                 checked
                                                 @endif
                                         @endforeach
                                         value="{{$experiance->id}}">
                                  {{$experiance->experiance}}</div>
                          @endforeach
                      </div>
                      <div class="row">
                          <h3 class="text-center">Guidances</h3>
                          @foreach($guidances as $guidance)
                              <div class="col-lg-6">
                                  <input class="disabled" type="checkbox"  name="guidances[]"
                                         @foreach($impactnetwork->guidances as $Iguid)
                                         @if($Iguid->id ==  $guidance->id)
                                         checked
                                         @endif
                                         @endforeach
                                         value="{{$guidance->id}}">
                                  {{$guidance->guidance}}</div>
                          @endforeach
                      </div>
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{{url('/admin/impactnetwork')}}" class="btn btn-default pull-right">back to Impact Netwoks</a>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection