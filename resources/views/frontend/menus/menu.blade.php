<div class="main-menu-wrapper">
    <div class="sh-component menu-wrapper">

        <div class="mm__menuWrapper">
            <div class="mm__mainMenu-trigger">
                <a href="#" class="mm__menuBurger">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div><!--/.mm__mainMenu-trigger-->

            <ul class="mm__mainMenu clearfix">


                @foreach($menus as $menu)
                    @if($menu->position == "nav")
                    @foreach($menu->items as $item)
                <li><a class="mm__menu-link" href="{{$item->link}}"><span>{{$item->name}}</span></a></li>

                {{--<li><a class="mm__contact active" href="contact.html"><span>LOGIN</span></a></li>--}}

                    @endforeach
                    @endif
                    @endforeach

                    <li><a class="mm__menu-link" href="{{route('impact.index')}}"><span>Impact Networks</span></a></li>
                    <li><a class="mm__menu-link" href="{{url('/')}}"><span>Home</span></a></li>
            </ul><!--/.mm__mainMenu-->



        </div><!--/.mm__menuWrapper-->


    </div>
    <!--sign up button-->
    <div class="mm__ctaButton sh-component">
        @guest()
            <li><a class="btn btn--round btn--fullblack" href="{{route('login')}}"><span>Login</span></a> &nbsp;&nbsp;
            <a class="btn btn--round btn--fullblack" href="{{route('register')}}"><span>Sign up</span></a></li>
        @else
            <li>
                <a href="#" class="btn btn--round btn--fullblack"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> logout </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @endguest
    </div>
    <!--cart icon-->

</div>