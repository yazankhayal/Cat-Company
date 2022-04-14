<!DOCTYPE html>
<html lang="">
<head>
    @includeIf('layouts.css')
    @yield('css')
</head>
<body>

@include("layouts.header")

@yield("content")

@include("layouts.footer")

<!-- Whatsapp -->

<!-- SCRIPTS -->
@includeIf('layouts.js')
<script>
    var geturlphoto = function () {
        return "{{setting()->public}}";
    };
    $(document).ready(function () {

        $(document).on('keypress', '#search form input', function (e) {
            if (e.which == 13) {
                var val = $(this).val();
                $("#search form").submit();
            }
        });

        $(document).ajaxStart(function () {
            NProgress.start();
        });
        $(document).ajaxStop(function () {
            NProgress.done();
        });
        $(document).ajaxError(function () {
            NProgress.done();
        });

    });
</script>
@yield('js')

</body>

</html>
