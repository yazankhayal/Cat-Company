@extends('layouts.app')

@section('title')
    {{$item->name()}}
@endsection


@section('content')

    @includeIf("layouts.breadcrumb")

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 blog-posts post-single">
                    <div class="blog-post clearfix">
                        <div class="post-media">
                            <a href="{{$item->route()}}" class="post-img">
                                <img style="width: 100%;" src="{{$item->img()}}" alt="{{$item->name()}}">
                            </a>
                        </div><!-- .post-media end -->

                        <div class="post-date">
                            <p class="day">{{$item->date('d')}}</p>
                            <p class="month">{{$item->date('M')}}</p>
                        </div><!-- .post-date end -->

                        <div class="post-body">
                            {!! $item->summary() !!}
                        </div><!-- .post-body end -->
                    </div><!-- .blog-post end -->
                </div><!-- .col-md-9.blog-posts.post-list end -->


            </div><!-- .row end -->

            <!-- .contact form start -->


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
        </div><!-- .container end -->
    </div><!-- .page-content end -->


@endsection
