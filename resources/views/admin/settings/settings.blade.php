@extends('admin.template.master')

@section('content')
       <h1>Content</h1>


   {{dd($logo)}}
       <div class="form">
              <form class="form" enctype="multipart/form-data" role="form" method="POST" action="{{ route('settings.store') }}" >
              {!! csrf_field() !!}

                     <div class="form-group">
                            <label for="post_image">Post image</label>
                            <input type="file" id="post_image" name="image">
                            <p class="help-block">image suported png,jpej or jpg,gif</p>
                     </div>

                     <div class="box-footer">
                            <a href="{{route('post.index')}}" class="btn btn-default pull-right">Cancel</a>
                            <button type="submit" class="btn btn-primary ">Save</button>
                     </div>

              </form>

       </div>
    @endsection