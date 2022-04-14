@extends('layouts.app')

@section('title')
    {{$lang->Contact}}
@endsection

@section('css')
    <style>
        iframe {
            width: 100%;
            height: 300px;
        }

        .contact-desc p {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')

    @includeIf("layouts.breadcrumb")

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="custom-heading">
                        <h3>@yield("title")</h3>
                    </div><!-- .custom-heading.left end -->

                    <p>
                        Cozy sphinx waves quart jug of bad milk. A very bad
                        quack might jinx zippy fowls. Few quips galvanized
                        the mock jury box. Quick brown dogs jump over the
                        lazy fox. The jay, pig, fox, zebra, and my wolves
                        quack! Blowzy red vixens fight for a quick jump.
                        Joaquin Phoenix was gazed by MTV for luck. A
                        wizard’s job is to vex chumps quickly in fog. Watch
                        "Jeopardy!", Alex Trebek's fun TV quiz game.
                        Woven silk pyjamas exchanged for blue quartz.
                        Brawny gods just.
                    </p>

                    <br />

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

                </div><!-- .col-md-6 end -->

                <div class="col-md-6">
                    <div class="custom-heading">
                        <h3>{{lang_name('google_map')}}</h3>
                    </div><!-- .custom-heading end -->

                    {!! hp_contact()->iframe !!}

                    <div class="custom-heading">
                        <h4>{{lang_name('company_information')}}</h4>
                    </div><!-- .custom-heading end -->

                    <address>
                        {{hp_contact()->address}}
                    </address>

                    <span class="text-big colored">
                       {{hp_contact()->phone}}
                        </span>
                    <br />

                    <a href="mailto:{{hp_contact()->email}}">{{hp_contact()->email}}</a>
                </div><!-- .col-md-6 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div>

@endsection
