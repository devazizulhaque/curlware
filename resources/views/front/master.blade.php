<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    @include('front.includes.css')

    @yield('css')

    <style>
        .main-banner .item-1 {
      background-image: url({{ asset('front/assets/images/banner-01.jpg') }});
    }

    .main-banner .item-2 {
      background-image: url({{ asset('front/assets/images/banner-02.jpg') }});
    }

    .main-banner .item-3 {
      background-image: url({{ asset('front/assets/images/banner-03.jpg') }});
    }
    </style>
  </head>

<body>

  @include('front.includes.header')

  @yield('body')

  @include('front.includes.footer')

  @include('front.includes.js')

  @yield('js')
  </body>
</html>