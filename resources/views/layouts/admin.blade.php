<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Techome') }}</title>

    

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">


  <script src="https://cdn.tiny.cloud/1/satjyjb2faggn4zb0mgxut74ut18y7hd6kqcp616rhw27z29/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  

    <!-- Styles -->
    <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
    
</head>
<body class="g-sidenav-show  bg-gray-200">
    {{-- Sidebar --}}
        @include('layouts.inc.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        {{-- navbar --}}
        @include('layouts.inc.adminnav')

        <div class="container-fluid py-4">
            {{-- content --}}
            @yield('content')

            {{-- Footer --}}
            @include('layouts.inc.adminfooter')
        </div>
    </main>
    
    <!-- Scripts -->
  <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('admin/js/popper.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/js/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/js/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/js/chartjs.min.js')}}"></script>

  <!-- Sweet Alert 2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('status'))
        <script>
            console.log("fire Swal");
            Swal.fire({
                icon: 'success',
                title: 'Done',
                text: '{{session('status')}}'
            })
        </script>
  
      
  @endif

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{asset('admin/js/material-dashboard.min.js?v=3.0.0')}}"></script>

  @yield('scripts')
</body>
</html>
