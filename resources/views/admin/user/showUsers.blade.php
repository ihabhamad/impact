@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>Users List</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/users')}}"><i class="active"></i> Users List</a></li>
                    
        @endsection

@section('content')

      <div class="row">
     
      <div class="col-md-2">
        <a href="{{route('newUser')}}" class="btn btn-success btn-block margin-bottom">Add User</a>
        
      </div>
        <div class="col-md-12">
         @include('admin.info')
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Users List</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    
                      @foreach($users as $user)
                      @if($user->trashed())
                      <tr class="danger">
                      @else
                      <tr>
                      @endif
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>

                  
                      <td>
                      @if(!$user->trashed())
                      <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('delete-form{{$user->id}}').submit();"> Delete</a>
		                       <form id="delete-form{{$user->id}}" action="{{ route('user.delete',$user->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                       </form>
		              @else
		                  <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('fdelete-form{{$user->id}}').submit();"> Force Delete </a>
		                       <form id="fdelete-form{{$user->id}}" action="{{ route('user.deleteforce',$user->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                      </form>     
                      @endif
                      </td>
                      <td>
                      @if(!$user->trashed())
                      <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning btn-block margin-bottom">Update</a>
                      @else
                       <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('rostore-form{{$user->id}}').submit();"> Restore </a>
		                       <form id="rostore-form{{$user->id}}" action="{{ route('user.restore',$user->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                      </form>
                      @endif
                      </td>
                      <td>
                      @if(!$user->trashed())
                      <a href="{{route('user.password.adminreset',$user->id)}}" class="btn btn-primary btn-block margin-bottom">Password Reset</a>
                      @endif

                      </td>
                      <td>
                          @if($user->approved)
                              <a href="{{route('user.deactivate',$user->id)}}" class="btn btn-danger btn-block margin-bottom">De Activate</a>
                          @else
                              <a href="{{route('user.active',$user->id)}}" class="btn btn-success btn-block margin-bottom">Active</a>
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
