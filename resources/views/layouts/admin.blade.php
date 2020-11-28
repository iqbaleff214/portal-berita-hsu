@extends('layouts.app')

@section('body-class', 'sidebar-mini')

@section('body')
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    @include('component.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('component.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('component.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection