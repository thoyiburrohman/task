@extends('layouts.app')
@section('title', 'List Proyek')
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net/css/dataTables.bootstrap5.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net/js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Setup - add a text input to each footer cell
            $('#searchProject th:not(:last-child)').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm bg-white" placeholder="Search" />'
                );
            });
            // DataTables
            var table = $('#datatables').DataTable({
                language: {
                    paginate: {
                        previous: '‹',
                        next: '›',
                    }
                }
            });
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
            $('.btn-hapus').click(function(e) {
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
            $('#btn-back').click(function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Status akan kembali menjadi progress!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0891b2',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, selesaikan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-cancel').click(function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Proyek akan dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0891b2',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, batalkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                });
            });
            $('#btn-back').click(function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Status akan kembali menjadi progress!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0891b2',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, selesaikan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                });
            });
        });
    </script>
@endpush
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
            <div class="col-12">
                <!-- start Zero Configuration -->
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">

                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('project.create') }}" class="btn btn-primary "><i
                                            class="ti ti-plus"></i> Tambah Proyek</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered text-nowrap align-middle"
                                style="width:100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th class="bg-primary text-white">Nama Proyek</th>
                                        <th class="bg-primary text-white">Jenis</th>
                                        <th class="bg-primary text-white">Lokasi</th>
                                        <th class="bg-primary text-white">Tanggal Kontraktor</th>
                                        <th class="bg-primary text-white">Status</th>
                                        <th class="bg-primary text-white">Action</th>
                                    </tr>
                                    <tr id="searchProject">
                                        <th class="bg-primary text-white">Nama Proyek</th>
                                        <th class="bg-primary text-white">Jenis</th>
                                        <th class="bg-primary text-white">Lokasi</th>
                                        <th class="bg-primary text-white">Tanggal Kontraktor</th>
                                        <th class="bg-primary text-white">Status</th>
                                        <th class="bg-primary text-white"></th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($projects as $item)
                                        <tr>
                                            <td class="text-capitalize">{{ $item->name }}</td>
                                            <td class="text-capitalize">{{ $item->type }}</td>
                                            <td class="text-capitalize">{{ $item->location }}</td>
                                            <td class="text-capitalize">{{ $item->date }}</td>
                                            <td class="text-capitalize ">
                                                @if ($item->status == 'selesai')
                                                    <span
                                                        class="badge rounded-pill bg-success-subtle text-success">{{ $item->status }}</span>
                                                @elseif($item->status == 'sedang berlangsung')
                                                    <span
                                                        class="badge rounded-pill bg-warning-subtle text-warning">{{ $item->status }}</span>
                                                @else
                                                    <span
                                                        class="badge rounded-pill bg-primary-subtle text-primary">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('project.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-info rounded-pill"><i
                                                        class="ti ti-edit me-2"></i>Edit</a>
                                                <a href="{{ route('project.cancel', [$item->id]) }}"
                                                    class="btn btn-cancel btn-sm btn-warning rounded-pill"><i
                                                        class="ti ti-x me-2"></i>Cancel</a>
                                                <a href="{{ route('project.delete', [$item->id]) }}"
                                                    class="btn btn-hapus btn-sm btn-danger rounded-pill"><i
                                                        class="ti ti-trash me-2"></i>Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
                <!-- end Zero Configuration -->
            </div>
        </div>
    </div>
@endsection
