<div class="header-wrapper header-transparent">
    <!-- .header.header-style01 start -->
    <header id="header" class="header-style01">
        <!-- .container start -->
        <div class="container">
            <!-- .main-nav start -->
            <div class="main-nav">
                <!-- .row start -->
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-default nav-left" role="navigation">

                            <!-- .navbar-header start -->
                            <div class="navbar-header">
                                <div class="logo">
                                    <a href="{{route('index')}}" title="{{lang_name('Home_page')}}"><img
                                            src="{{setting()->avatar()}}" alt="{{setting()->name()}}"
                                            title="{{setting()->name()}}">
                                    </a>
                                </div><!-- .logo end -->
                            </div><!-- .navbar-header start -->

                            <!-- MAIN NAVIGATION -->
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="{{current_route("index") == "active" ? "current-menu-item" : ""}}"><a
                                            href="{{route('index')}}">{{lang_name('Home_Page')}}</a></li>

                                    <li class="{{current_route("about") == "active" ? "current-menu-item" : ""}}"><a
                                            href="{{route('about')}}">{{lang_name('About')}}</a></li>

                                    <li class="{{current_route("services") == "active" ? "current-menu-item" : ""}} dropdown">
                                        <a href="#" data-toggle="dropdown"
                                           class="dropdown-toggle">{{lang_name('Services')}}</a>
                                        <ul class="dropdown-menu">
                                            @if(services()->count() != 0)
                                                @foreach(services() as $r)
                                                    <li><a href="{{$r->route_services()}}">{{$r->name()}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul><!-- .dropdown-menu end -->
                                    </li><!-- .dropdown end -->

                                    <li class="{{current_route("for_sell") == "active" ? "current-menu-item" : ""}}"><a
                                            href="{{route('for_sell')}}">{{lang_name('For_sell')}}</a></li>
                                    <li class="{{current_route("previous") == "active" ? "current-menu-item" : ""}}"><a
                                            href="{{route('previous')}}">{{lang_name('Previous')}}</a></li>
                                    <li class="{{current_route("blog") == "active" ? "current-menu-item" : ""}}"><a
                                            href="{{route('blog')}}">{{lang_name('Blog')}}</a></li>

                                    <li class="{{current_route("contact") == "active" ? "current-menu-item" : ""}}"><a
                                            href="{{route('contact')}}">{{lang_name('Contact')}}</a></li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown"
                                           class="dropdown-toggle">{{$select_lan->name}}</a>
                                        <ul class="dropdown-menu">
                                            @if($langauges->count() > 0)
                                                @foreach($langauges as $lang222)
                                                    <li>
                                                        <a href="{{route('change_language',['lang'=>$lang222->dir])}}">{{$lang222->name}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul><!-- .dropdown-menu end -->
                                    </li><!-- .dropdown end -->
                                </ul><!-- .nav.navbar-nav end -->

                                <!-- RESPONSIVE MENU -->
                                <div id="dl-menu" class="dl-menuwrapper">
                                    <button class="dl-trigger">Open Menu</button>

                                    <ul class="dl-menu">
                                        <li><a href="{{route('index')}}">{{lang_name('Home_Page')}}</a></li>
                                        <li><a href="{{route('about')}}">{{lang_name('About')}}</a></li>

                                        <li>
                                            <a href="{{route('products')}}">{{lang_name('Services')}}</a>
                                            <ul class="dl-submenu">
                                                @if(services()->count() != 0)
                                                    @foreach(services() as $r)
                                                        <li><a href="{{$r->route_services()}}">{{$r->name()}}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul><!-- dl-submenu end -->
                                        </li>

                                        <li><a href="{{route('for_sell')}}">{{lang_name('For_sell')}}</a></li>
                                        <li><a href="{{route('previous')}}">{{lang_name('Previous')}}</a></li>
                                        <li><a href="{{route('blog')}}">{{lang_name('Blog')}}</a></li>
                                        <li><a href="{{route('contact')}}">{{lang_name('Contact')}}</a></li>
                                    </ul><!-- .dl-menu end -->
                                </div><!-- #dl-menu end -->

                                <!-- #search start -->
                                <div id="search">
                                    <form action="{{route('products')}}" method="get">
                                        <input class="search-submit" type="submit"/>
                                        <input id="m_search" name="q" type="text" placeholder="{{lang_name('Search_now')}}"/>
                                    </form>
                                </div><!-- #search end -->
                            </div><!-- MAIN NAVIGATION END -->
                        </nav><!-- .navbar.navbar-default end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .main-nav end -->
        </div><!-- .container end -->
    </header><!-- .header.header-style01 -->
</div><!-- .header-wrapper end -->
