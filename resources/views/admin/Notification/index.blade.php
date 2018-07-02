@extends('admin.template.master')
@section('content-header')
    <h1>
        Dashboard
        <small>Notifications</small>
    </h1>
@endsection
@section('breadcrumb')
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{url('/admin/notifications')}}"><i class="active"></i> Notifications </a></li>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            @include('admin.info')
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">UnRead Notifications</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Notify</th>
                        </tr>

                        @foreach(Auth::user()->unreadNotifications as $notification)
                            @php
                                $notification->markAsRead();
                            @endphp
                         <tr>
                             <td>

                                 @if($notification->type == "App\Notifications\UserConnectImpactPerson")
                                     <i class="fa fa-users text-aqua fa-3"></i>
                                 @elseif($notification->type == "App\Notifications\UserApproveApplication")
                                     <i class="fa fa-bullhorn text-maroon fa-3"></i>
                                 @endif
                             </td>
                             <td>{{$notification->data['username']}}</td>
                             <td>{{$notification->data['email']}}</td>
                             <td>
                                 @if($notification->type == "App\Notifications\UserConnectImpactPerson")
                                     Need to Connect To Impact Person :
                                     <a href="{{route('impactnetwork.show',$notification->data['Impact_person_id'])}}">{{$notification->data['Impact_person']}}</a>
                                 @elseif($notification->type == "App\Notifications\UserApproveApplication")
                                     User Apply to this Application :

                                     <a href="{{route('application.show',$notification->data['Application_id'])}})}}">{{$notification->data['Application']}}</a>

                                 @endif
                             </td>
                             <td>{{$notification->data['massage']}}</td>
                         </tr>
                        @endforeach

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">All Notifications</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Notify</th>
                        </tr>

                        @foreach(Auth::user()->Notifications as $notification)

                            <tr>
                                <td>

                                    @if($notification->type == "App\Notifications\UserConnectImpactPerson")
                                        <i class="fa fa-users text-aqua fa-3"></i>
                                    @elseif($notification->type == "App\Notifications\UserApproveApplication")
                                        <i class="fa fa-bullhorn text-maroon fa-3"></i>
                                    @endif
                                </td>
                                <td>{{$notification->data['username']}}</td>
                                <td>{{$notification->data['email']}}</td>
                                <td>
                                    @if($notification->type == "App\Notifications\UserConnectImpactPerson")
                                        Need to Connect To Impact Person :
                                      <a href="{{route('impactnetwork.show',$notification->data['Impact_person_id'])}}">{{$notification->data['Impact_person']}}</a>

                                    @elseif($notification->type == "App\Notifications\UserApproveApplication")
                                        User Apply to this Application :
                                        <a href="{{route('application.show',$notification->data['Application_id'])}}">{{$notification->data['Application']}}</a>
                                    @endif
                                </td>
                                <td>{{$notification->data['massage']}}</td>
                            </tr>
                        @endforeach

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div>
    </div>

@endsection
