<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Techome - @yield('title')</title>

    
    <link rel="icon" href="{{ url('favicon.png') }}">

    <!-- Styles -->
    <link id="pagestyle" href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('frontend/css/owl.theme.default.min') }}" rel="stylesheet" />
    <style>
        body{
            padding-top: 4vh;
        }

    </style>
    @yield('custom-css')

</head>
<body>
   @include('layouts.inc.navbar')

   <div class="content_container">
       @yield('content')
   </div>

   @include('layouts.inc.footer')


    <!-- Scripts -->
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>


    <!-- Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('status'))
        <script>
            // console.log("fire Swal");
            Swal.fire({
                icon: 'success',
                title: 'Done',
                text: '{{session('status')}}'
            })
        </script>
    
        
    @endif
    
    @yield('custom-scripts')

   
    
</body>
</html>