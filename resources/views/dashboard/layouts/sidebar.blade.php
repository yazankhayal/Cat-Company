<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{route('index')}}">
            <img src="{{path().setting()->avatar}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{path().setting()->avatar}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{path().setting()->avatar}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{path().setting()->avatar}}" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a>
        <!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{path().$user->avatar}}" alt="{{$user->name}}" class="avatar-xl rounded-circle">
            </div>
            <div class="user-info">
                <h6 class=" mb-0 text-dark">{{$user->name}}</h6>
                <span class="text-muted app-sidebar__user-name text-sm">{{$user->email}}</span>
            </div>
        </div>
    </div>
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle">
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="{{$lang->Request_booking_Products}}">
                <a href="{{route('dashboard_request_products.index')}}" class="nav-link text-center m-2">
                    <i class="fe fe-settings"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="{{$lang->Home}}">
                <a href="{{route('index')}}" target="_blank" class="nav-link text-center m-2">
                    <i class="fe fe-navigation"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="{{$lang->Users}}">
                <a href="{{route('dashboard_users.index')}}" class="nav-link text-center m-2">
                    <i class="fe fe-users"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="{{$lang->LogOff}}">
                <a class="nav-link text-center m-2" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                  document.getElementById('logout-form2').submit();">
                    <i class="fe fe-power"></i>
                </a>
                <form id="logout-form2" action="{{ route('logout') }}"
                      method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <ul class="side-menu">
        <li><h3>{{$lang->Dashboard}}</h3></li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span
                    class="side-menu__label">{{$lang->Dashboard}}</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('dashboard_admin.index')}}" class="slide-item">{{$lang->Dashboard}}</a></li>
                <li><a href="{{route('dashboard_contact_us.index')}}" class="slide-item">{{$lang->Contact_us}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span
                        class="side-menu__label">{{$lang->Edit_Home_page}}</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('dashboard_slider.index')}}" class="slide-item">{{$lang->Slider}}</a></li>
                <li><a href="{{route('dashboard_fact.index')}}" class="slide-item">{{$lang->fact}}</a></li>
                <li><a href="{{route('dashboard_about.index')}}" class="slide-item">{{$lang->About}}</a></li>
                <li><a href="{{route('dashboard_how_work.index')}}" class="slide-item">{{$lang->how_work}}</a></li>
                <li><a href="{{route('dashboard_faqs.index')}}" class="slide-item">{{$lang->faqs}}</a></li>
                <li><a href="{{route('dashboard_gallery.index')}}" class="slide-item">{{$lang->gallery}}</a></li>
                <li><a href="{{route('dashboard_special.index')}}" class="slide-item">{{$lang->special}}</a></li>
                <li><a href="{{route('dashboard_about_list.index')}}" class="slide-item">{{$lang->About_List}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-shopping-cart"></i><span
                    class="side-menu__label">{{$lang->Blog}}</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('dashboard_posts.add_edit')}}" class="slide-item">{{$lang->Create}}</a></li>
                <li><a href="{{route('dashboard_posts.index')}}" class="slide-item">{{$lang->Blog}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-shopping-cart"></i><span
                    class="side-menu__label">{{$lang->Services}}</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('dashboard_products.add_edit')}}" class="slide-item">{{$lang->Create}}</a></li>
                <li><a href="{{route('dashboard_products.index')}}" class="slide-item">{{$lang->Services}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-printer"></i><span
                    class="side-menu__label">{{$lang->For_sell}}</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('dashboard_products.for_sell_add_edit')}}" class="slide-item">{{$lang->Create}}</a></li>
                <li><a href="{{route('dashboard_products.for_sell')}}" class="slide-item">{{$lang->For_sell}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-paint-bucket"></i><span
                    class="side-menu__label">{{$lang->Previous}}</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('dashboard_products.previous_add_edit')}}" class="slide-item">{{$lang->Create}}</a></li>
                <li><a href="{{route('dashboard_products.previous')}}" class="slide-item">{{$lang->Previous}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-settings"></i><span
                    class="side-menu__label">{{$lang->email_setting}}</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('dashboard_send_email.index')}}" class="slide-item">{{$lang->Send_Email}}</a></li>
                <li><a href="{{route('dashboard_email_setting.index')}}" class="slide-item">{{$lang->email_setting}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-settings"></i><span
                        class="side-menu__label">{{$lang->Setting}}</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{route('dashboard_setting.index')}}" class="slide-item">{{$lang->Setting}}</a></li>
                <li><a href="{{route('dashboard_hp_contact_us.index')}}" class="slide-item">{{$lang->Contact_us}}</a></li>
                <li><a href="{{route('dashboard_scripts.index')}}" class="slide-item">{{$lang->Scripts}}</a></li>
                <li><a href="{{route('dashboard_language.index')}}" class="slide-item">{{$lang->Language}}</a></li>
                <li><a href="{{route('dashboard_users.index')}}" class="slide-item">{{$lang->Users}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
										  document.getElementById('logout-form2').submit();">
                <i class="side-menu__icon fa fa-sign-out"></i><span class="side-menu__label">
								{{$lang->LogOff}}</span>
            </a>
            <form id="logout-form2" action="{{ route('logout') }}"
                  method="POST"
                  style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</aside>
