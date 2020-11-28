<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  @include('component.head')
</head>
<body class="hold-transition @yield('body-class')">

@yield('body')

@include('component.script')

</body>
</html>
