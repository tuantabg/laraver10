<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('colorlib-regform-7/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('colorlib-regform-7/css/style.css') }}">

<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                @yield('content')
            </div>
        </section>
    </div>

    <script src="{{ asset('colorlib-regform-7/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('colorlib-regform-7/js/main.js') }}"></script>

</body>
</html>
