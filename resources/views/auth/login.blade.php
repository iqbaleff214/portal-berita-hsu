@extends('layouts.app')

@section('title', 'Login')
@section('body-class', 'login-page')

@section('body')
<div class="login-box">
    <div class="login-logo">
      <a href="{{ route('home') }}"><b>Berita</b>HSU</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk untuk melanjutkan</p>
  
        <form action="{{ route('login') }}" method="post">
        @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror 

          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror 

          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mb-1 mt-3">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection