<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/User/layouts/header.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/User/layouts/footer.css') }}" rel="stylesheet">
    {{-- <script src="jquery-3.7.1.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    @stack('styles')
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
  
    @stack('scripts')
</body>
</html>