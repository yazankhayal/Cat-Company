<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>{{setting()->name()}}-@yield('title')</title>

@yield("seo")

<meta charset="utf-8">
<link rel="shortcut icon" href="{{path().setting()->fav}}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{path().setting()->fav}}">

<!-- Stylesheets -->
<link rel="stylesheet" href="{{path()}}files/home/css/bootstrap.css"/><!-- bootstrap grid -->
<link rel="stylesheet" href="{{path()}}files/home/masterslider/style/masterslider.css"/><!-- Master slider css -->
<link rel="stylesheet" href="{{path()}}files/home/masterslider/skins/default/style.css"/><!-- Master slider default skin -->
<link rel="stylesheet" href="{{path()}}files/home/css/animate.css"/><!-- animations -->
<link rel='stylesheet' href='{{path()}}files/home/owl-carousel/owl.carousel.css'/><!-- Client carousel -->
<link rel="stylesheet" href="{{path()}}files/home/css/style.css"/><!-- template styles -->
<link rel="stylesheet" href="{{path()}}files/home/css/color-default.css"/><!-- template main color -->
<link rel="stylesheet" href="{{path()}}files/home/css/retina.css"/><!-- retina ready styles -->
<link rel="stylesheet" href="{{path()}}files/home/css/responsive.css"/><!-- responsive styles -->

<!-- Google Web fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,800,700,600'
      rel='stylesheet' type='text/css'>

<!-- Font icons -->
<link rel="stylesheet" href="{{path()}}files/home/icon-fonts/font-awesome-4.3.0/css/font-awesome.min.css"/><!-- Fontawesome icons css -->

@if(app()->getLocale() == "ar")
    <link rel="stylesheet" href="{{path()}}files/home/css/rtl.css">
@endif

<link rel="stylesheet" href="{{path()}}css/toastr.min.css">
<link rel="stylesheet" href="{{path()}}nprogress-master/nprogress.css"/>
<style>

    /***** whatsapp ********/
    #whatsapp {
        position: fixed;
        bottom: 140px;
        right: 30px;
        z-index: 99;
    }
    #whatsapp a {
        display: block;
        background: #04d894;
        color: #fff;
        font-size: 25px;
        width: 50px;
        height: 50px;
        text-align: center;
        line-height: 50px;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
    }
    #whatsapp .light {
        width: 70px;
        height: 70px;
        position: absolute;
        background: #8ef9d6;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        z-index: -1;
        -webkit-animation: lightning 1.5s linear infinite;
        animation: lightning 1.5s linear infinite;
    }
    .toast, #toast-container {
        z-index: 9999999999999999;
    }

    .menu_cat_ico {
        width: 22px;
        height: 14px;
    }

    .ho-form2 {
        padding: 30px;
        border-radius: 0;
        border: 1px solid #d5d5d5;
    }

    .flag_c {
        width: 25px;
        height: 18px;
    }

    /***** whatsapp ********/
    #whatsapp {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 99;
    }
</style>
@if(scripts())
    @if(scripts()->css)
        {!! scripts()->css !!}
    @endif
@endif
