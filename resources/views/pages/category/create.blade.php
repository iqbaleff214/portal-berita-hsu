@extends('layouts.admin')

@section('style')
@endsection

@section('title', 'Kategori Berita')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kategori Berita</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Beranda</li>
                <li class="breadcrumb-item">Kategori Berita</li>
                <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form class="form-horizontal" method="POST" action="{{ route('kategori.store') }}">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" id="category" placeholder="Judul" name="category">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a href="{{ route('kategori.index') }}" class="btn btn-default float-right">Kembali</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </form>

        </section>
        <!-- /.content -->
@endsection


@section('script')
<script>
    
    $(function() {
       
    });

</script>
@endsection