@extends('frontend.master.master')
@section('content')

    <div class="mm-subheader" style = "background-image: url({{asset("uploads/posts/$post->image")}})" id="home">

        <div class="custom-width-container custom-height-container container flex">
            <div class="row flex-center xs-flex-top">
                <div class="col-md-12 col-sm-12">
                    <div class="title-block">
                        <h1 class="home-heading">{!! wordwrap($post->title , 1 , "<br>\n") !!}


                        </h1>

                    </div>

                </div>
            </div>
        </div>

    </div><!--end subheader-->
    <!--start about section-->
    <section id="about" class="page-section pgt-135 pgb-135">
        <div class="container custom_width">
            <div class="title-block">

            </div>
            <p class="about-text txt-center txt-black ">{!! $post->content !!}</p>


        </div><!--end container -->


    </section>

    <!--our work section -->


    <!--pricing section-->
    <!--icons section-->

    <!--testimonials section-->
    <!--drop us a line section-->
@endsection