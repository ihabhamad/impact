@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>Admins List</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/admins')}}"><i class="active"></i> Admins List</a></li>
                    
        @endsection

@section('content')

      <div class="row">
     
      <div class="col-md-2">
        <a href="{{route('newadmin')}}" class="btn btn-success btn-block margin-bottom">Add Admin</a>
        
      </div>
        <div class="col-md-12">
         @include('admin.info')
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Admins List</h3>
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
                    
                      @foreach($admins as $admin)
                      @if($admin->trashed())
                      <tr class="danger">
                      @else
                      <tr>
                      @endif
                      <td>{{$admin->name}}</td>
                      <td>{{$admin->email}}</td>
                      <td>
                      @if(!$admin->trashed())
                      <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('delete-form{{$admin->id}}').submit();"> Delete</a>
		                       <form id="delete-form{{$admin->id}}" action="{{ route('admin.delete',$admin->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                       </form>
		              @else
		                  <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('fdelete-form{{$admin->id}}').submit();"> Force Delete </a>
		                       <form id="fdelete-form{{$admin->id}}" action="{{ route('admin.deleteforce',$admin->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                      </form>     
                      @endif
                      </td>
                      <td>
                      @if(!$admin->trashed())
                      <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-warning btn-block margin-bottom">Update</a>
                      @else
                       <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('rostore-form{{$admin->id}}').submit();"> Restore </a>
		                       <form id="rostore-form{{$admin->id}}" action="{{ route('admin.restore',$admin->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                      </form>
                      @endif
                      </td>
                      <td>
                      @if(!$admin->trashed())
                      <a href="{{route('admin.password.adminreset',$admin->id)}}" class="btn btn-primary btn-block margin-bottom">Password Reset</a>
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
