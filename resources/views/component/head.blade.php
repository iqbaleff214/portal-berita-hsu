<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name') }} | @yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/b8cc568f15.js" crossorigin="anonymous"></script>
@yield('style')
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/css/custom.css') }}">