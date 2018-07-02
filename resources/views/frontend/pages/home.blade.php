@extends('frontend.master.master')
@section('content')
    @foreach($posts as $post)
        @if($post->post_type === 'header')

    <div class="mm-subheader" style="background-image: url({{(url("uploads/posts/$post->image"))}})" id="home">

        <div class="custom-width-container custom-height-container container flex">
            <div class="row flex-center xs-flex-top">
                <div class="col-md-12 col-sm-12">


                    <div class="title-block">
                        <h1 class="home-heading">
                            {{--{!! wordwrap($post->title , 1 ,"<br>\n") !!}--}}

                           {{$post->title}}
                        </h1>
                    </div>


                </div>
            </div>
        </div>

    </div><!--end subheader-->
           @break
        @endif
    @endforeach

    <!--start about section-->


    <section id="about" class="page-section pgt-135 pgb-135">
        <div class="container custom_width">

            <div class="title-block">
                <h6 class="subtitle--about txt-black txt-center">We craft ecosystems that grow businesses.</h6>
            </div>
            <p class="about-text txt-center txt-black ">We're a full-service digital agency that believes being a
                Favorite brand is more valuable than just being a Famous one. We craft beautifully useful, connected
                ecosystems that grow businesses and build enduring relationships between brands and humans.</p>


        </div><!--end container -- >
    </section>
    <!--our work section -->
    <section class="page-section pg-t-b-0">
        <div class="section-full-width">
            <div class="row gutter-0">
                <!--first 3 columns-->
                @foreach($posts as $post)
                    @if($post->post_type === 'our')
                        <div class="col-md-4 col-sm-4">
                            <div class="column-wrapper flex flex-center-x ">
                                <div class="column-content flex-center">
                                    <div class="title-block">
                                        <h6 class="subtitle--about txt-black">{{$post->title}}</h6>
                                        <div class="separator-fancy clearfix"></div>
                                        <p class="subtitle--small txt-black">{!! $post->content !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                        <div class="column-wrapper--img flex flex-center-x ">
                        <div class="column-content">
                        <img src="{{ asset("uploads/posts/$post->image") }}"
                        class="img-responsive image-cover-fit image-box-img" alt title="imagebox">
                        </div>
                        </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


    <!--pricing section-->
    <section id="pricing" class="pricing-section page-section bg-color--white  pgt-150 pgb-150">
        <div class="rellax rellax-third" data-rellax-percentage="0.9"
             style="background-image: url({{asset('front/images/parallax-background.jpg')}});">
        </div>
        <div class="container custom_width flex-center">
            <div class="row">
                <div class=" col-md-12 col-sm-12 ">
                    <div class="title-block">
                        <h6 class="title--large txt-light txt-center pgb-100">Alumni Exclusive Programs</h6>
                    </div>
                </div>
                <!-- start memebrship columns -->
                @foreach($applications as $application)
                    <div class="col-md-4 col-sm-4 border-right">
                        <div class="pricing-element">
                            <div class="title-block">
                                <h2 class="title--huge txt-center txt-color">{{$application->title}}</h2>
                            </div>
                            <div class="pricing-description">
                                <p class="pricing-description__item">{{$application->content}}</p>

                            </div>
                            <div class="txt-center">
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn--extralg btn--round btn--fullwhite">{{ __('Login') }}</a>
                                @else
                                    <a href="{{ route('app.view',$application->slug) }}" class="btn btn--extralg btn--round btn--fullwhite">VIEW</a>
                                @endguest

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="blog" class="page-section bg-color--grey pgt-115 pgb-115">
        <div class="container custom_width">
            <div class="row">
                <div class=" col-md-12 col-sm-12 ">
                    <div class="title-block ">
                        <h6 class="title--large txt-black txt-center pgb-60">Events</h6>
                    </div>
                </div>
            </div>
            @foreach($posts as $post)
                @if($post->post_type == "event")
                    <div class="blog-element">
                        <!--big blog thumb-->
                        <div class="flex-col first-blog-col">
                            <div style="background-image: url({{asset("uploads/posts/$post->image")}})" class="post-bigimage">
                                <ul class="post-categories">
                                    <li>
                                        <a href="#">{{$post->title}}</a>
                                    </li>
                                </ul>
                                <div class="post-heading">
                                    <div class="title-block ">
                                        <h2 class="title--blog txt-center">
                                            <a href="#">{{$post->title}}
                                            </a>
                                        </h2>
                                        <p class="post-info txt-light txt-center ">FEBRUARY 1, 2017</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--smaller blog thumbs-->
                        <div class="flex-col second-blog-col">
                            <div class="col-xs-12 ">
                                <p>
                                    {!! $post->content !!}
                                </p>
                            </div>
                        </div>

                    </div>
                @endif
            @endforeach


        </div>

    </section>
    <!--icons section-->

    <!--testimonials section-->
    <!--drop us a line section-->

@endsection