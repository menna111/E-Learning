<!doctype html>
<html lang="ar" dir="rtl">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-offset.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/media.css')}}">

    <title>@yield('title',env('APP_NAME'))</title>
</head>
<body @yield('color',"style=background-color:black")>

<!--
    ==================================================
                        Home Index
    ==================================================
    - Top Section Home
      - NavBar
      - InterFace
        - Interface Image
        - Interface text

    - Mid Section Home
      - Boxes
        - 3 Box
      - Lecturer
      - Lecturer
      - Objects

    - Bottom Section Home
      - Row
        - About US
        - con Us
      - Copy Right
      - Objects

    ==================================================
                            End
    ==================================================

-->



<section class="top-section-home" dir="rtl">
    <div class="container">

     @include('partials.nav')
    </div>

   @yield('interface');

</section>
<!-- ==================================================
                      End Top Section
================================================== -->




@yield('content')

@include('partials.footer')
@yield('script')
</body>
</html>

