<div class="page-title-style01 page-title-negative-top pt-bkg02" style="background-image:url('{{setting()->bunner()}}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>@yield("title")</h1>

                <div class="breadcrumb-container">
                    <ul class="breadcrumb clearfix">
                        <li>@yield("title")</li>

                        <li>
                            <a href="{{route('index')}}">{{$lang->Home_Page}}</a>
                        </li>
                    </ul><!-- .breadcrumb end -->
                </div><!-- .breadcrumb-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-title-style01.page-title-negative-top end -->
