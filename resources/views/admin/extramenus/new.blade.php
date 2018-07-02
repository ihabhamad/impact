@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>Extra Menus</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{url('/admin/extramenus')}}"> Extra Menus</a></li>
                    <li><a href="{{url('/admin/extramenus/new')}}"><i class="active"></i> New Item</a></li>
                    
        @endsection

@section('content')

      <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Item</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form"  role="form" method="POST" action="{{ route('newExtramenu.submit') }}" >
                  {!! csrf_field() !!}

                  <div class="box-body">
                    @include('admin.errors')
                    @include('admin.info')
                   <div class="form-group">
                      <label for="name">Menu English Name</label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Enter Menu name">
                    </div>
                    <div class="form-group">
                      <label for="css">CSS Attr</label>
                      <input type="text" name="css" class="form-control" value="{{old('css')}}" id="css" placeholder="Enter css exa:.info,btn,btn-success;">
                    </div>
                      <div class="form-group">
                          <label>Menu Position</label>
                          <select class="form-control" name="position">
                              <option value="footer">footer</option>
                              <option value="nav">Nav Bar</option>
                          </select>
                      </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{{url('/admin/extramenus')}}" class="btn btn-default pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary ">Save</button>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection