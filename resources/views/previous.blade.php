@extends('layouts.app')

@section('title')
    {{$lang->Previous}}
@endsection

@section('css')
@endsection

@section('content')

    @includeIf("layouts.breadcrumb")

    <div class="page-content custom-bkg bkg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-heading02">
                        <h2>@yield("title")</h2>
                        <p>{{lang_name('TAILORED_LOGISTIC_SERVICES')}}</p>
                    </div><!-- .custom-heading02 end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->

            <div class="row">

                @if($items->count() != 0)
                    @foreach($items as $r)
                        <div class="col-md-4 col-sm-4">
                            <div class="service-feature-box">
                                <div class="service-media">
                                    <img style="height: 215px;" src="{{$r->img()}}" alt="{{$r->name()}}">

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
                @else
                    <div class="col-lg-12 col-md-12">
                        <p class="alert-warning alert text-center">{{$lang->Empty}}</p>
                    </div>
                @endif

                <div class="col-lg-12 col-md-12">
                    <div class="pagination">
                        {{$items->render()}}
                    </div>
                </div>
            </div><!-- .row end -->

        </div><!-- .container end -->
    </div><!-- .page-content end -->

@endsection
