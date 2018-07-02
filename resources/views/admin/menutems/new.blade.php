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
                    <li><a href="{{url('/admin/extramenus/items/'.$menuId)}}"> Menus Items</a></li>
                    <li><a href="{{url('/admin/extramenus/items/new/'.$menuId)}}"><i class="active"></i> New Item</a></li>
                    
        @endsection

@section('content')

      <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Item</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form"  role="form" method="POST" action="{{ route('newItem.submit',$menuId) }}" >
                  {!! csrf_field() !!}

                  <div class="box-body">
                    @include('admin.errors')
                    @include('admin.info')
                   <div class="form-group">
                      <label for="name">Link English Name</label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Enter menu Item name">
                    </div>
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" name="is_child" id="is_child"> Item is A child
                          </label>
                      </div>
                      <div class="form-group" id="parents">
                          <label>select parent</label>
                          <select class="form-control" name="parentid" id="parents_id">
                              @foreach($parents as $parent)
                                  <option value="{{$parent->id}}">{{$parent->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Link Type</label>
                          <select class="form-control" name="link_type" id="link_type">
                              <option value="external" selected>External Link</option>
                              <option value="post">Post Link</option>
                              <option value="application">Application link</option>

                          </select>
                      </div>
                    <div class="form-group" id="external">
                      <label for="link">Link</label>
                      <input type="text" name="link" class="form-control" value="{{old('link')}}" id="link" placeholder="menu link exa:http://example.com/feeds">
                    </div>
                      <div class="form-group" id="spad">
                          <label>Applications</label>
                          <select class="form-control" name="link_to_app">
                              @foreach($Apps as $app)
                                  <option value="{{$app->id}}">{{$app->title}}</option>
                              @endforeach

                          </select>
                      </div>
                      <div class="form-group" id="post">
                          <label>Posts</label>
                          <select class="form-control" name="link_to_post">
                              @foreach($posts as $post)
                              <option value="{{$post->id}}">{{$post->title}}</option>
                              @endforeach
                          </select>
                      </div>
                   
                    <div class="form-group">
                      <label for="css">CSS Attr</label>
                      <input type="text" name="css" class="form-control" value="{{old('css')}}" id="css" placeholder="Enter css exa:.info,btn,btn-success;">
                    </div>
                   
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{{url('/admin/extramenus/items/'.$menuId)}}" class="btn btn-default pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary ">Save</button>
                  </div>
                </form>
              </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#spad').hide();
            $('#post').hide();
            $('#parents').hide();
            $(document).on('change','#link_type',function(){
              link_type = $('#link_type').val();
              if(link_type == "external"){
                  $('#spad').hide();
                  $('#post').hide();
                  $('#external').show();
              }else if(link_type == "application"){
                  $('#spad').show();
                  $('#post').hide();
                  $('#external').hide();
              }else if(link_type == "post"){
                  $('#spad').hide();
                  $('#post').show();
                  $('#external').hide();
              }

            });
            $(document).on('change','#is_child',function(){
                if(this.checked) {
                    $('#parents').show();
                }
                if(this.checked == false) {
                    $('#parents').hide();
                }

            });

        });
    </script>
@endsection