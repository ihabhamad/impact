@extends('admin.template.master')
          @section('content-header')
           <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
         @endsection
        @section('breadcrumb')
                    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    
        @endsection

@section('content')

@endsection
