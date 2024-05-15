@extends('layouts.app')
@section('title', 'List Tugas')
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net/css/dataTables.bootstrap5.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net/js/dataTables.bootstrap5.min.js') }}"></script>
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
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-status').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var idProject = $(this).data('project');
                var status = $(this).data('status');
                let token = $('meta[name=token]').attr('content');
                $.ajax({
                    type: "post",
                    url: "/task/status/" + id,
                    data: {
                        "project_id": idProject,
                        "status": status,
                        "_token": token,
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Status berhasil diupdate'
                        })
                        window.location.reload();
                    }
                });
            });
        });
    </script>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">

                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('task.create') }}" class="btn btn-primary "><i class="ti ti-plus"></i>
                                        Tambah Tugas</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered text-nowrap align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">Nama Task</th>
                                        <th class="bg-primary text-white">Proyek</th>
                                        <th class="bg-primary text-white">Priority</th>
                                        <th class="bg-primary text-white">Tim</th>
                                        <th class="bg-primary text-white">Status</th>
                                        <th class="bg-primary text-white">Action</th>
                                    </tr>
                                    <tr id="searchProject">
                                        <th class="bg-primary text-white">Nama Task</th>
                                        <th class="bg-primary text-white">Proyek</th>
                                        <th class="bg-primary text-white">Priority</th>
                                        <th class="bg-primary text-white">Tim</th>
                                        <th class="bg-primary text-white">Status</th>
                                        <th class="bg-primary text-white"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $item)
                                        <tr>
                                            <td class="text-capitalize">{{ $item->name }}</td>
                                            <td class="text-capitalize">{{ $item->project->name }}</td>
                                            <td class="text-capitalize">{{ $item->priority }}</td>
                                            <td class="text-capitalize">{{ $item->tim }}</td>
                                            <td class="text-capitalize ">
                                                <div class="btn-group">
                                                    @if ($item->status == 'selesai')
                                                        <button type="button"
                                                            class="btn bg-success-subtle text-capitalize text-success dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            {{ $item->status }}
                                                        @elseif($item->status == 'sedang berlangsung')
                                                            <button type="button"
                                                                class="btn bg-warning-subtle text-capitalize text-warning dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                {{ $item->status }}
                                                            @else
                                                                <button type="button"
                                                                    class="btn bg-primary-subtle text-capitalize text-primary dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ $item->status }}
                                                                </button>
                                                    @endif
                                                    <ul
                                                        class="dropdown-menu bg-primary-subtle text-primary animated flipInX">
                                                        <li>
                                                            <a class="dropdown-item btn-status text-capitalize"
                                                                data-project="{{ $item->project_id }}"
                                                                data-id="{{ $item->id }}"
                                                                data-status="sedang berlangsung" href="#">sedang
                                                                berlangsung</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item btn-status text-capitalize"
                                                                data-project="{{ $item->project_id }}"
                                                                data-id="{{ $item->id }}" data-status="selesai"
                                                                href="#">
                                                                selesai</a>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <button href="{{ route('task.delete', [$item->id]) }}"
                                                    class="btn btn-hapus btn-sm btn-danger rounded-pill"><i
                                                        class="ti ti-trash me-2"></i>Delete</button>
                                                <a href="{{ route('task.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-info rounded-pill"><i
                                                        class="ti ti-edit me-2"></i>Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
