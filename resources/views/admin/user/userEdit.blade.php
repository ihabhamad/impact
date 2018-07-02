@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>Users List</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/users')}}"> Admins List</a></li>
                    <li><a href="{{url('/admin/users/edit/'.$user->id)}}"><i class="active"></i> edit user</a></li>
                    
        @endsection

@section('content')

      <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form" role="form" method="POST" action="{{ route('user.update',$user->id) }}">
                  {{ csrf_field() }}

                  <div class="box-body">
                    @include('admin.errors')
                     @include('admin.info')
                    <div class="form-group">
                      <label for="AdminName">Name</label>
                      <input type="text" name="name" class="form-control" value="{{$user->name}}" id="AdminName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label for="AdminEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" value="{{$user->email}}" id="AdminEmail1" placeholder="Enter Email">
                    </div>
                   
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{{url('/admin/users')}}" class="btn btn-default pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary ">Update</button>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection
