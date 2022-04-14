@extends('layouts.app')

@section('title')
    {{$lang->Blog}}
@endsection

@section('content')

    @includeIf("layouts.breadcrumb")

    <div class="page-content">
        <div class="container">
            <div class="row">
                <ul class="blog-posts post-list">

                    @includeIf("data.blog")

                </ul><!-- .col-md-9.blog-posts.post-list end -->

            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

@endsection
