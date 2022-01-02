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

    {{-- <style>
        .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #da4619;
            display:flex;
            justify-content: center;
            align-items: center;
            }
        .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            /* top: 50%; */
            /* border: 4px solid #Fff; */
            color: #fff;
            animation: loader 3s infinite ease;
            }
    </style> --}}

    @yield('custom-css')

</head>
<body>
   @include('layouts.inc.navbar')

   <div class="content_container">
       @yield('content')
   </div>

   @include('layouts.inc.footer')

{{-- 
   <!-- Loader -->
   <div class="loader-wrapper">
    <span class="loader">LOADING</span>
   </div> --}}

    <!-- Scripts -->
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>

    <!-- show page when loaded -->
    {{-- <script>
        $(window).on("load",function(){
            $(".loader-wrapper").fadeOut("slow");
        });
    </script> --}}

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


   
    
</body>
</html>