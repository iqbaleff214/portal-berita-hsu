@extends('layouts.admin')

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('title', 'Berita')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Berita</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Beranda</li>
                <li class="breadcrumb-item">Berita</li>
                <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form class="form-horizontal" method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
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
                            <label for="title" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" placeholder="Judul" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control select2bs4" id="category_id" name="category_id" style="width: 100%">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($loop->first) selected="selected" @endif>{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Konten Berita</label>
                            <div class="col-sm-10">
                                <textarea class="form-control summernote @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10 row">
                                <div class="col-12">
                                    {{-- <img src="{{ asset('storage/default.jpg') }}" alt="Default Cover Image" class="img-thumbnail"> --}}
                                    <a href="{{ asset("storage/default.png") }}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                                        <img src="{{ asset("storage/default.png") }}" class="img-fluid mb-2 img-thumbnail img-preview" alt="black sample"/>
                                    </a>
                                </div>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                        <label class="custom-file-label" for="image" data-browse="Cari">Pilih gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a href="{{ route('berita.index') }}" class="btn btn-default float-right">Kembali</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </form>

        </section>
        <!-- /.content -->
@endsection


@section('script')
<!-- InputMask -->
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    
    $(function() {
        
        $('.summernote').summernote({
            height: 250
        });
        $('[data-mask]').inputmask();
        $('#image').on('change', function() {
            previewImage();
        });
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $('#title').on('keyup', function(e) {
            $('a[data-toggle="lightbox"]').attr('data-title', $(e.target).val());
        });

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

    });

    function previewImage() {
        const cover = document.querySelector('#image');
        const coverLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        coverLabel.textContent = cover.files[0].name;

        const coverFile = new FileReader();
        coverFile.readAsDataURL(cover.files[0]);

        coverFile.onload = function(e) {
          imgPreview.src = e.target.result;
          $('a[data-toggle="lightbox"]').attr('href', e.target.result);
        }
    }

</script>
@endsection