@extends('layouts.admin')

@section('style')
@endsection

@section('title', 'Dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Beranda</li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Semua</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
                <div class="p-3">
                    <h1 class="display-4">Selamat datang, {{ Auth::user()->name }}!</h1>
                    {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
                    <hr class="my-4">
                    <p>Halaman ini adalah halaman admin di mana anda dapat membuat berita/blog baru.</p>
                    <a class="btn btn-danger mt-4" href="{{ route('berita.create') }}" role="button">Berita baru</a>
                  </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            {{-- Footer --}}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
@endsection


@section('script')
@endsection