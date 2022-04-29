

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>{{ $title }}</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/bootstrap.min.css') !!}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/style.css') !!}">
      <!-- Responsive-->
      <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/responsive.css') !!}">
      <!-- fevicon -->
      <link rel="icon" href="{!! asset('assets/images/fevicon.png') !!}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{!! asset('assets/css/jquery.mCustomScrollbar.min.css') !!}">
      {{-- about --}}
      <link rel="stylesheet" href="assets/css/about.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <!-- body -->
   <body class="main-layout">

      @include('partials.header')

      @yield('container')

      @include('partials.footer')

      <!-- Javascript files-->
      <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
      <script src="{!! asset('assets/js/popper.min.js') !!}"></script>
      <script src="{!! asset('assets/js/bootstrap.bundle.min.js') !!}"></script>
      <script src="{!! asset('assets/js/jquery-3.0.0.min.js') !!}"></script>

      <!-- sidebar -->
      <script src="{!! asset('assets/js/jquery.mCustomScrollbar.concat.min.js') !!}"></script>
      <script src="{!! asset('assets/js/custom.js') !!}"></script>
      <script src="{!! asset('assets/https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js') !!}"></script>
   </body>
</html>

