@extends('layouts.app')

@section('title')
    {{$item->name()}}
@endsection

@section('css')

@endsection

@section('content')

    @includeIf("layouts.breadcrumb")

    <div class="page-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{$item->img()}}" alt="{{$item->name()}}"/>
                        </div><!-- .col-md-4 end -->

                        <div class="col-md-7">
                            <div class="custom-heading">
                                <h2>{{$item->name()}}</h2>
                            </div>

                            {!! $item->summary() !!}

                        </div><!-- .col-md-5 end -->
                    </div><!-- .row end -->

                    <div class="row">
                        <div class="col-md-5">
                            {!! $item->sub_summary() !!}
                        </div><!-- .col-md-4 end -->

                        <div class="col-md-7 custom-bkg bkg-light-blue">
                            <div class="custom-heading">
                                <h3>{{lang_name('Details')}}</h3>
                            </div><!-- .custom-heading end -->

                            <form
                                class="wpcf7 clearfix row request_product ajaxForm"
                                method="post"
                                action="{{route('request_product')}}"
                                data-name="request_product">
                                {{csrf_field()}}
                                <input id="products_id" name="products_id" value="{{$item->id}}" type="hidden">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="wpcf7-text cls" type="text" id="f_name" name="f_name"
                                               placeholder="{{$lang->f_Name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="wpcf7-text cls" type="text" id="l_name" name="l_name"
                                               placeholder="{{$lang->l_Name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="wpcf7-text cls" type="text" id="phone" name="phone"
                                               placeholder="{{$lang->Phone}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class=" wpcf7-text cls" type="email" id="email" name="email"
                                               placeholder="{{$lang->Email}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                            <textarea name="summary" id="summary" class="wpcf7-text cls" rows="7"
                                      placeholder="{{$lang->Comments}}"></textarea>
                                    </div>
                                </div>

                                <input type="submit" class="wpcf7-submit" value="{{lang_name('Order')}}"/>
                            </form><!-- .wpcf7 end -->
                        </div><!-- .col-md-6 end -->
                    </div><!-- .row end -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-heading">
                                <h3>{{lang_name('More_Service')}}</h3>
                            </div><!-- .custom-heading end -->
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->

                    <div class="row">
                        @if($item->related_products)
                            @if(count(explode(",",$item->related_products)) != 0)
                                @foreach(explode(",",$item->related_products) as $key => $value)
                                    @if($value)
                                        @php $item_pr = find_product($value) @endphp
                                        @if($item_pr)
                                            <div class="col-md-4 col-sm-4">
                                                <div class="service-feature-box">
                                                    <div class="service-media">
                                                        <img style="height: 215px;" src="{{$item_pr->img()}}" alt="{{$item_pr->name()}}">
                                                        <a href="{{$item_pr->route()}}" class="read-more02">
                                            <span>
                                                {{lang_name('Read_More')}}
                                                <i class="fa fa-chevron-right"></i>
                                            </span>
                                                        </a>
                                                    </div><!-- .service-media end -->

                                                    <div class="service-body">
                                                        <div class="custom-heading">
                                                            <h4>{{$item_pr->name()}}</h4>
                                                        </div><!-- .custom-heading end -->

                                                        <p>
                                                            {{$item_pr->sub_name()}}
                                                        </p>
                                                    </div><!-- .service-body end -->
                                                </div><!-- .service-feature-box-end -->
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endif

                    </div><!-- .row end -->
                </div><!-- .col-md-9 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

@endsection

