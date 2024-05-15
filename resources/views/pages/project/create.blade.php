@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--single {
            border-radius: 24px !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 20px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".select2").select2();
    </script>
@endpush
@section('title', 'Tambah Proyek')
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
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('project.index') }}">Proyek</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('project.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Proyek</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Jenis Proyek</label>
                            <input type="text" id="type" name="type"
                                class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}">
                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input location="text" id="location" name="location"
                                class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
                            @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal Kontraktor</label>
                            <input type="date" id="date" name="date"
                                class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="date" id="deadline" name="deadline"
                                class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}">
                            @error('deadline')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File Pendukung</label>
                            <input type="file" id="file" name="file"
                                class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3"><i
                                class="ti ti-device-floppy me-2 "></i>Save</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
