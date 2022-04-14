@extends('layouts.app')

@section('title')
    {{$lang->About}}
@endsection

@section('content')

    @includeIf("layouts.breadcrumb")

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-heading02">
                        <h2>{{$lang->About}}</h2>
                        <p>
                            {{lang_name('page_about_1')}}
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
    </div>

    <div class="page-content custom-bkg bkg-light-blue mb-70">
        <div class="container">
            <div class="row">
                {!! $how_work->summary() !!}
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content.custom-bkg end -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="custom-heading02">
                    <h2>{{lang_name('page_about')}}</h2>
                    <p>{{lang_name('page_about_p')}}</p>
                </div>
            </div><!-- .row end -->

            <div class="row">

                @if($faqs->count() != 0)
                    @foreach($faqs as $r)
                        <div class="col-md-3 col-sm-6">
                            <div class="service-icon-center">
                                <div class="icon-container">
                                    <img class="svg-white" src="{{$r->img1()}}" alt="{{$r->name()}}"/>
                                </div>

                                <h4>{{$r->name()}}</h4>

                                <p>
                                    {{$r->summary()}}
                                </p>
                            </div><!-- .service-icon-center end -->
                        </div><!-- .col-md-3 end -->
                    @endforeach
                @endif

            </div><!-- .row end -->

            <div class="row">
                <div class="col-md-12">
                    <div class="custom-heading">
                        <h2>{{lang_name('board_of_directors')}}</h2>
                    </div><!-- .custom-heading end -->
                    <form
                        class="wpcf7 driver-app-form clearfix row contact_post ajaxForm"
                        method="post"
                        action="{{route('contact_post')}}"
                        data-name="contact_post">
                        {{csrf_field()}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="f_name">{{$lang->f_Name}}</label>
                                <input class="wpcf7-text cls" type="text" id="f_name" name="f_name"
                                       placeholder="{{$lang->f_Name}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="l_name">{{$lang->l_Name}}</label>
                                <input class="wpcf7-text cls" type="text" id="l_name" name="l_name"
                                       placeholder="{{$lang->l_Name}}">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">{{$lang->Phone}}</label>
                                <input class="wpcf7-text cls" type="text" id="phone" name="phone"
                                       placeholder="{{$lang->Phone}}">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">{{$lang->Email}}</label>
                                <input class=" wpcf7-text cls" type="email" id="email" name="email"
                                       placeholder="{{$lang->Email}}">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="summary">{{$lang->Comments}}</label>
                                <textarea name="summary" id="summary" class="wpcf7-text cls" rows="7"
                                          placeholder="{{$lang->Comments}}"></textarea>

                            </div>
                        </div>

                        <input type="submit" class="wpcf7-submit" value="{{lang_name('Send_Message')}}">
                    </form><!-- .wpcf7 end -->

                </div><!-- .col-md-9 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

@endsection
