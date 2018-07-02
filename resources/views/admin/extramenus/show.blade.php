@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>Extra Menus</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/extramenus')}}"><i class="active"></i> Extra Menus</a></li>
                    
        @endsection

@section('content')

      <div class="row">
     
      <div class="col-md-2">
        <a href="{{route('newExtramenu')}}" class="btn btn-success btn-block margin-bottom">New Menu</a>
        
      </div>
        <div class="col-md-12">
         @include('admin.info')
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Nav Menuss</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tr>
                      <th>Menu Name</th>
                      <th>Css Attr</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    
                      @foreach($extramenus as $menu)
                      @if($menu->position == "nav")
                      @if($menu->trashed())
                      <tr class="danger">
                      @else
                      <tr>
                      @endif
                      
                      <td>{{$menu->name}}</td>
                      <td>{{$menu->css}}</td>
                      <td>
                      @if(!$menu->trashed())
                      <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('delete-form{{$menu->id}}').submit();"> Delete</a>
		                       <form id="delete-form{{$menu->id}}" action="{{ route('extramenu.delete',$menu->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                       </form>
		              @else
		                  <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('fdelete-form{{$menu->id}}').submit();"> Force Delete </a>
		                       <form id="fdelete-form{{$menu->id}}" action="{{ route('extramenu.deleteforce',$menu->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                      </form>     
                      @endif
                      </td>
                      <td>
                      @if(!$menu->trashed())<a href="{{route('extramenu.edit',$menu->id)}}
                      " class="btn btn-warning btn-block margin-bottom">Update</a>
                      @else
                       <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('rostore-form{{$menu->id}}').submit();"> Restore </a>
		                       <form id="rostore-form{{$menu->id}}" action="{{ route('extramenu.restore',$menu->id) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                      </form>
                      @endif
                      </td>
                      <td>
                      <a href="{{route('Items.manage',$menu->id)}}
                      " class="btn btn-info btn-block margin-bottom">Items</a>
                      
                      </td>
                      </tr>
                      @endif
                      @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">footer Menus</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>
                            <th>Menu Name</th>
                            <th>Css Attr</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach($extramenus as $menu)
                            @if($menu->position == "footer")
                                @if($menu->trashed())
                                    <tr class="danger">
                                @else
                                    <tr>
                                        @endif

                                        <td>{{$menu->name}}</td>
                                        <td>{{$menu->css}}</td>
                                        <td>
                                            @if(!$menu->trashed())
                                                <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                        document.getElementById('delete-form{{$menu->id}}').submit();"> Delete</a>
                                                <form id="delete-form{{$menu->id}}" action="{{ route('extramenu.delete',$menu->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            @else
                                                <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                        document.getElementById('fdelete-form{{$menu->id}}').submit();"> Force Delete </a>
                                                <form id="fdelete-form{{$menu->id}}" action="{{ route('extramenu.deleteforce',$menu->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$menu->trashed())<a href="{{route('extramenu.edit',$menu->id)}}
                                                    " class="btn btn-warning btn-block margin-bottom">Update</a>
                                            @else
                                                <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault();
                                                        document.getElementById('rostore-form{{$menu->id}}').submit();"> Restore </a>
                                                <form id="rostore-form{{$menu->id}}" action="{{ route('extramenu.restore',$menu->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('Items.manage',$menu->id)}}
                                                    " class="btn btn-info btn-block margin-bottom">Items</a>

                                        </td>
                                    </tr>
                                @endif
                                @endforeach

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

    </div>

@endsection
