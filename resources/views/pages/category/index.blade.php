@extends('layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
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
                <li class="breadcrumb-item active">Kategori Berita</li>
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
                <div class="my-3">
                    <a href="{{ route('kategori.create') }}" class="btn btn-danger">
                        <i class="fas fa-folder-plus"></i> Tambah
                    </a>
                </div>
                <table id="datatable" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Kategori</th>
                            <th>Jumlah berita</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category }}</td>
                            <td>{{ $category->blog->count() }}</td>
                            <td>{{ $category->description ? $category->description : '-' }}</td>
                            <td>
                                <form action="{{ route('kategori.destroy', $category) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group" role="group">
                                        <button id="btn-action-{{ $loop->iteration }}" type="button" class="btn btn-outline-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btn-action-{{ $loop->iteration }}">
                                            <a class="dropdown-item btn btn-sm" href="{{ route('kategori.edit', $category) }}">Edit</a>
                                            <button class="dropdown-item btn btn-sm" type="submit">Hapus</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>      
                    @endforeach
                    </tbody>
                </table>
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
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        @if(Session::has('message'))
        Toast.fire({
            icon: 'success',
            title: "{{ Session::get('message') }}"
        })
        @endif

        $('.delete-form').on('submit', function(e) {
            deleteConfirm(e, this);
        });

        $("#datatable").DataTable({
            "responsive": true,
            "autoWidth": false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json'
            },
        });

    });

    function deleteConfirm(e, form) {
        e.preventDefault();
        Swal.fire({
            title: 'Menghapus Kategori',
            text: "Yakin ingin Menghapus kategori ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    }
  </script>
@endsection