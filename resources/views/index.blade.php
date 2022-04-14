@extends('layouts.app')

@section('title')
    {{$lang->Home_Page}}
@endsection

@section('content')

    <div id="masterslider" class="master-slider ms-skin-default mb-0">

        @if($slider->count() != 0)
            @foreach($slider as $r)
                <div class="ms-slide">
                    <!-- slide background -->
                    <img src="{{path()}}files/home/masterslider/blank.gif" data-src="{{$r->img1()}}"
                         alt="{{$r->name()}}"/>

                    <img class="ms-layer" src="{{path()}}files/home/masterslider/blank.gif"
                         data-src="{{path()}}files/home/img/slider-line.jpg" alt=""
                         style="left: 0; top: 310px;"
                         data-type="image"
                         data-effect="left(short)"
                         data-duration="300"
                         data-hide-effect="fade"
                         data-delay="0"
                    />

                    <h2 class="ms-layer pi-caption01"
                        style="left: 0; top: 340px;"
                        data-type="text"
                        data-effect="left(short)"
                        data-duration="300"
                        data-hide-effect="fade"
                        data-delay="300"
                    >
                        {{$r->name()}}
                    </h2>

                    <h2 class="ms-layer pi-caption01"
                        style="left: 0; top: 400px;"
                        data-type="text"
                        data-effect="left(short)"
                        data-duration="300"
                        data-hide-effect="fade"
                        data-delay="600"
                    >
                        {{$r->sub_name()}}
                    </h2>

                    <h2 class="ms-layer pi-caption01"
                        style="left: 0; top: 460px;"
                        data-type="text"
                        data-effect="left(short)"
                        data-duration="300"
                        data-hide-effect="fade"
                        data-delay="900"
                    >
                        {!! $r->summary() !!}
                    </h2>
                </div>
            @endforeach
        @endif

    </div>

    <div class="page-content parallax parallax01 mb-70" style="background-image: url('{{setting()->fact()}}')">
        <div class="container">
            <div class="row services-negative-top">

                @if($services->count() != 0)
                    @foreach($services as $r)
                        <div class="col-md-4 col-sm-4">
                            <div class="service-feature-box">
                                <div class="service-media">
                                    <img style="height: 215px;" src="{{$r->img()}}" alt="{{$r->name()}}"/>

                                    <a href="{{$r->route()}}" class="read-more02">
                                    <span>
                                        {{lang_name('Read_More')}}
                                        <i class="fa fa-chevron-right"></i>
                                    </span>
                                    </a>
                                </div><!-- .service-media end -->

                                <div class="service-body">
                                    <div class="custom-heading">
                                        <h4>{{$r->name()}}</h4>
                                    </div><!-- .custom-heading end -->

                                    <p>
                                        {{$r->sub_name()}}
                                    </p>
                                </div><!-- .service-body end -->
                            </div><!-- .service-feature-box-end -->
                        </div>
                    @endforeach
                @endif

            </div><!-- .row end -->

            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('products')}}" class="btn btn-big btn-yellow btn-centered">
                            <span>
                                {{lang_name('Services')}}
                            </span>
                    </a>
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-heading02">
                        <h2>{{lang_name('About_Us')}}</h2>
                        <p>
                            {{lang_name('About_Us_pargrah')}}
                        </p>
                    </div><!-- .custom-heading02 end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->

            <div class="row mb-30">
                <div class="col-md-6">
                    {!! $about->summary() !!}
                </div><!-- .col-md-6 end -->

                <div class="col-md-6 animated triggerAnimation" data-animate="zoomIn">
                    <img src="{{$about->img1()}}" alt=""/>
                </div><!-- .col-md-6 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

    <div class="page-content custom-bkg bkg-dark-blue column-img-bkg dark mb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-2 custom-col-padding-both">


                    {!! $fact->summary() !!}

                    <ul class="service-list clearfix">

                        @if($how_work->count() != 0)
                            @foreach($how_work as $r)
                                <li>
                                    <a href="{{$r->link}}">
                                        <div class="icon-container">
                                            <img class="svg-white" src="{{$r->img1()}}" alt="{{$r->name()}}"/>
                                        </div><!-- .icon-container end -->

                                        <p>
                                            {{$r->name()}}
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        @endif

                    </ul><!-- .service-list end -->
                </div><!-- .col-md-6 end -->

                <div class="col-md-6 img-bkg01" style="background-image: url('{{$fact->img1()}}')">
                    <div>&nbsp;</div>
                </div>
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content.bkg-dark-blue end -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-heading02">
                        <h2>{{lang_name('Blog')}}</h2>
                        <p>
                            {{lang_name('Blog_pargrah')}}
                        </p>
                    </div><!-- .custom-heading02 end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
            <div class="row">
                <ul class="blog-posts post-list main-post">

                    @if($blog->count() != 0)
                        @foreach($blog as $r)
                            <li class="col-md-4 blog-post clearfix">
                                <div class="post-media">
                                    <a href="{{$r->route()}}" class="post-img">
                                        <img src="{{$r->img()}}" alt="{{$r->name()}}">
                                    </a>
                                </div><!-- .post-media end -->

                                <div class="post-body">
                                    <a href="{{$r->route()}}">
                                        <h3>{{$r->name()}}</h3>
                                    </a>

                                    <p>
                                        {{$r->tags()}}
                                    </p>

                                    <a href="{{$r->route()}}" class="read-more">
                                    <span>
                                        {{lang_name('Read_More')}}
                                        <i class="fa fa-chevron-right"></i>
                                    </span>
                                    </a>
                                </div><!-- .post-body end -->
                            </li>
                        @endforeach
                    @endif

                </ul><!-- .col-md-9.blog-posts.post-list end -->

            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

@endsection
