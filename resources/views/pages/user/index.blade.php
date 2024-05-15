@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net/css/dataTables.bootstrap5.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $('#datatables').DataTable({
            scrollX: true
        });
        document.addEventListener("DOMContentLoaded", function() {
            // Setup - add a text input to each footer cell
            $('#search th:not(:last-child)').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm bg-white" placeholder="Search" />'
                );
            });
            // DataTables
            var table = $('#datatables').DataTable();
            // Apply the search
            table.columns().every(function() {
                var that = this;
                $('input', this.header()).on('keyup change clear', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#.btn-hapus').click(function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0891b2',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                });
            });
        });
    </script>
@endpush
@section('title', 'Users')
@section('content')
    <div class="container-fluid">
        <div class="card bg-primary-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- basic table -->
        <div class="row">
            <div class="row mb-3">
                <div class="col-6"></div>
                <div class="col-6">
                    <a href="{{ route('user.create') }}" class="btn btn-primary float-end"><i class="ti ti-plus"></i> Tambah
                        User</a>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                @if ($users->count())
                    @foreach ($users as $item)
                        <div class="col-lg-3 col-12">
                            <div class="card text-center bg-white pb-2 card-hover rounded-4">
                                <div class="p-2 d-block mt-3">

                                    <div classs="mt-2">
                                        <span class="badge text-bg-primary">{{ $item->role->name }}</span>
                                        <h3 class="card-title mt-3">{{ $item->name }}</h3>
                                        <p class="card-subtitle mb-3">{{ $item->email }}</p>
                                    </div>
                                    {{-- <span class="badge bg-secondary-subtle text-secondary mb-3">away</span> --}}
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <a href="{{ route('user.edit', $item->id) }}"
                                                class="btn btn-warning rounded-circle"><i class="ti ti-edit"></i></a>
                                        </div>
                                        <div class="col-3">
                                            <a id="btn-hapus" href="{{ route('user.delete', [$item->id]) }}"
                                                class="btn btn-danger rounded-circle">
                                                <i class="ti ti-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <h1 class="fw-semibold my-7 fs-9">No Users!!!</h1>
                        <h4 class="fw-semibold mb-7">
                            Belum ada user
                        </h4>
                        <a class="btn btn-primary" href="{{ route('user.create') }}" role="button"><i
                                class="ti ti-plus me-2"></i>Add New User</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
