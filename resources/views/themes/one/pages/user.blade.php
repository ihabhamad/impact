@extends('frontend.master.master')
@section('content')
    <div class="mm-subheader--bg mm-subheader--light flex">
        <div class="mm-subheader__container">
            <div class="container custom_width">

                <!--title section  -->
                <div class="subheader-title">

                </div>
            </div>
        </div>
    </div><!--end subheader-->
    <!--start section-->
    <section class="pgt-35 pgb-35 border-top bg-color--white">
        <div class="container custom_width">
            <div class="row">
                @include('admin.info')
                @include('admin.errors')
            </div>
            <div class="row" id="main">
                <div class="col-md-4 well" id="leftPanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <img src="http://www.meug.be/wp-content/uploads/2017/05/Team-Member.jpg" style="width: 210px;height: 210px" alt="Texto Alternativo"
                                     class="img-circle img-thumbnail">
                                <h2>{{auth()->user()->name}}</h2>
                                <br><br><br>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning">
                                        Social
                                    </button>
                                    <button type="button" class="btn btn-warning dropdown-toggle"
                                            data-toggle="dropdown">
                                        <span class="caret"></span><span class="sr-only">Social</span>
                                    </button>
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Twitter</a></li>--}}
                                        {{--<li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>--}}
                                        {{--<li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>--}}
                                        {{--<li class="divider"></li>--}}
                                        {{--<li><a href="#">Github</a></li>--}}
                                    {{--</ul>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 well" id="rightPanel">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST" action="{{route('profile.update')}}">
                                @csrf
                                <h2>Edit your profile.
                                    <small>It's always easy</small>
                                </h2>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="fullname" id="username"
                                                   class="form-control input-lg" placeholder="Full Name" tabindex="1" value="{{auth()->user()->name}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <input type="email" name="email" id="email" class="form-control input-lg"
                                               placeholder="Email Address" tabindex="4" value="{{auth()->user()->email}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password"
                                                   class="form-control input-lg" placeholder="Password" tabindex="5">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation"
                                                   id="password_confirmation" class="form-control input-lg"
                                                   placeholder="Confirm Password" tabindex="6">
                                        </div>
                                    </div>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"></div>
                                    <div class="col-xs-12 col-md-6"><button type="submit" class="btn btn-success btn-block btn-lg">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque,
                                        modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis
                                        rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque,
                                        modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis
                                        rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque,
                                        modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis
                                        rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque,
                                        modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis
                                        rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque,
                                        modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis
                                        rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque,
                                        modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis
                                        rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque,
                                        modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis
                                        rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
    </section>
@endsection
