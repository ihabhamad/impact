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
                    <li><a href="{{url('/admin/extramenus/items/'.$menuId)}}"><i class="active"></i>  Menus Items</a></li>
                    
        @endsection

@section('content')

      <div class="row">
     
      <div class="col-md-2">
        <a href="{{route('newItem',$menuId)}}" class="btn btn-success btn-block margin-bottom">New Item</a>
        
      </div>
        <div class="col-md-12">
         @include('admin.info')
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Parent Items</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tr>
                      <th>Name</th>
                      <th>childs name</th>
                      <th>link</th>
                      <th>Css</th>
                      <th></th>
                      <th></th>
                    </tr>
                    
                      @foreach($menus as $menu)
                      @if($menu->parentid == null)
                      @if($menu->trashed())
                      <tr class="danger">
                      @else
                      <tr>
                      @endif

                      <td>{{$menu->name}} </td>
                      <td>
                          <ul>
                          @foreach($menus as $childmenu)
                              @if($menu->id == $childmenu->parentid)
                                      <li>{{$childmenu->name}}</li>
                              @endif
                          @endforeach

                        </ul>
                      </td>
                      <td><a target="_blank" href="{{$menu->link}}">{{$menu->link}}</a></td>
                      <td>{{$menu->css}}</td>
                      <td>
                      @if(!$menu->trashed())
                      <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('delete-form{{$menu->id}}').submit();"> Delete</a>
		                       <form id="delete-form{{$menu->id}}" action="{{ route('item.delete',[$menuId,$menu->id]) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                       </form>
		              @else
		                  <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('fdelete-form{{$menu->id}}').submit();"> Force Delete </a>
		                       <form id="fdelete-form{{$menu->id}}" action="{{ route('item.deleteforce',[$menuId,$menu->id]) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                      </form>     
                      @endif
                      </td>
                      <td>
                      @if(!$menu->trashed())<a href="{{route('item.edit',[$menuId,$menu->id])}}
                      " class="btn btn-warning btn-block margin-bottom">Update</a>
                      @else
                       <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault(); 
                      document.getElementById('rostore-form{{$menu->id}}').submit();"> Restore </a>
		                       <form id="rostore-form{{$menu->id}}" action="{{ route('item.restore',[$menuId,$menu->id]) }}" method="POST" style="display: none;">
		                       {{ csrf_field() }}
		                      </form>
                      @endif
                      </td>
                      </tr>
                       @endif
                      @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Chaild Items Belong to Parents</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>
                            <th>Name</th>
                            <th>link</th>
                            <th>Css</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach($menus as $child)
                            @if($child->parentid != null)
                                @if($child->trashed())
                                    <tr class="danger">
                                @else
                                    <tr>
                                        @endif

                                        <td>{{$child->name}}</td>
                                        <td><a target="_blank" href="{{$child->link}}">{{$child->link}}</a></td>
                                        <td>{{$child->css}}</td>
                                        <td>
                                            @if(!$child->trashed())
                                                <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                        document.getElementById('delete-form{{$child->id}}').submit();"> Delete</a>
                                                <form id="delete-form{{$child->id}}" action="{{ route('item.delete',[$menuId,$child->id]) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            @else
                                                <a href="#" class="btn btn-danger btn-block margin-bottom" onclick="event.preventDefault();
                                                        document.getElementById('fdelete-form{{$child->id}}').submit();"> Force Delete </a>
                                                <form id="fdelete-form{{$child->id}}" action="{{ route('item.deleteforce',[$menuId,$child->id]) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$child->trashed())<a href="{{route('item.edit',[$menuId,$child->id])}}
                                                    " class="btn btn-warning btn-block margin-bottom">Update</a>
                                            @else
                                                <a href="#" class="btn btn-success btn-block margin-bottom" onclick="event.preventDefault();
                                                        document.getElementById('rostore-form{{$child->id}}').submit();"> Restore </a>
                                                <form id="rostore-form{{$child->id}}" action="{{ route('item.restore',[$menuId,$child->id]) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
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
