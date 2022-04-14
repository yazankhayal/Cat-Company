<div id="footer-wrapper" class="footer-dark">
    <footer id="footer">
        <div class="container">
            <div class="row">
                <ul class="col-md-3 col-sm-6 footer-widget-container clearfix">
                    <!-- .widget.widget_text -->
                    <li class="widget widget_newsletterwidget">
                        <div class="title">
                            <h3>{{lang_name('Footer_title_1')}}</h3>
                        </div>

                        <p>
                            {{lang_name('Footer_title_1_p')}}
                        </p>

                        <br/>

                        <form class="newsletter ajaxForm" method="post" action="{{route('newsletter')}}" data-name="newsletter">
                            {{csrf_field()}}
                            <input id="id" type="hidden" name="id">
                            <input class="email cls" type="email" id="email" name="email" placeholder="{{lang_name('Email')}}">
                            <input type="submit" class="submit" value="">
                        </form>
                    </li><!-- .widget.widget_newsletterwidget end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <!-- .widget-pages start -->
                    <li class="widget widget_pages">
                        <div class="title">
                            <h3>{{lang_name('Footer_title_2')}}</h3>
                        </div>

                        <ul>
                            <li><a href="{{route('index')}}">{{lang_name('Home_Page')}}</a></li>
                            <li><a href="{{route('about')}}">{{lang_name('About')}}</a></li>
                            <li><a href="{{route('for_sell')}}">{{lang_name('For_sell')}}</a></li>
                            <li><a href="{{route('previous')}}">{{lang_name('Previous')}}</a></li>
                            <li><a href="{{route('blog')}}">{{lang_name('Blog')}}</a></li>
                            <li><a href="{{route('contact')}}">{{lang_name('Contact')}}</a></li>
                        </ul>
                    </li><!-- .widget-pages end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <!-- .widget-pages start -->
                    <li class="widget widget_pages">
                        <div class="title">
                            <h3>{{lang_name('Footer_title_3')}}</h3>
                        </div>

                        <ul>
                            @if(pages_footer()->count() != 0)
                                @foreach(pages_footer() as $r)
                                    <li><a href="{{$r->route()}}">{{$r->name()}}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li><!-- .widget-pages end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <li class="widget widget-text">
                        <div class="title">
                            <h3>{{lang_name('Footer_title_4')}}</h3>
                        </div>

                        <address>
                            {{hp_contact()->address}}
                        </address>

                        <span class="text-big">
                               {{hp_contact()->phone}}
                                </span>
                        <br/>

                        <a href="mailto:{{hp_contact()->email}}">{{hp_contact()->email}}</a>
                        <br/>
                        <ul class="footer-social-icons">
                            @if(hp_contact()->facebook != null)
                                <li> <a href="{{hp_contact()->facebook}}"><span
                                            class="fa fa-facebook"></span></a></li>
                            @endif
                            @if(hp_contact()->twitter != null)
                                <li>   <a href="{{hp_contact()->twitter}}"><span class="fa fa-twitter"></span></a></li>
                            @endif
                            @if(hp_contact()->instagram != null)
                                <li>   <a href="{{hp_contact()->instagram}}"><span class="fa fa-instagram"></span></a></li>
                            @endif
                            @if(hp_contact()->pinterest != null)
                                <li>   <a href="{{hp_contact()->pinterest}}"><span
                                            class="fa fa-youtube"></span></a></li>
                            @endif
                        </ul><!-- .footer-social-icons end -->
                    </li><!-- .widget.widget-text end -->
                </ul><!-- .col-md-3.footer-widget-container end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </footer><!-- #footer end -->

    <div class="copyright-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; {{lang_name('Copy_Right')}} {{date('Y')}} - <a href="{{route('index')}}">{{setting()->name()}}</a></p>
                </div><!-- .col-md-6 end -->

            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .copyright-container end -->

    <a href="#" class="scroll-up">{{lang_name('Scroll')}}</a>
</div><!-- #footer-wrapper end -->
