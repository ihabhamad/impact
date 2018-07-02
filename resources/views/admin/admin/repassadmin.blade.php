@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>Admins List</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/admins')}}"> Admins List</a></li>
                    <li><a href="{{url('/admin/admins/passwordreset/'.$userid)}}"><i class="active"></i> Password Reset</a></li>
                    
        @endsection

@section('content')

      <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Password Reset for {{$username}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form" method="POST" action="{{ route('admin.password.adminreset.submit',$userid) }}">
                  {{ csrf_field() }}

                  <div class="box-body">
                    @include('admin.errors')
                     @include('admin.info')
                    <div class="form-group">
                      <label for="newPassword">New Password</label>
                      <input type="password" name="password" class="form-control"  id="AdminPassword" placeholder="New Password">
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Password Conferm</label>
                      <input type="password" name="password_confirmation" class="form-control"  id="password_confirmation" placeholder="Password Confirm">
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{{url('/admin/admins')}}" class="btn btn-default pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary ">Reset Password</button>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection
