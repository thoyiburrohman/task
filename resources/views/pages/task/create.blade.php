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
@section('title', 'Tambah Tugas')
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
                                    <a class="text-muted text-decoration-none" href="{{ route('task.index') }}">Tugas</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('task.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Tugas</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="project_id" class="form-label">Nama Proyek</label>
                            <select class="select2 form-control @error('project_id') is-invalid @enderror" id="project_id"
                                name="project_id">
                                @foreach ($projects as $item)
                                    <option class="text-capitalize" {{ old('project_id') == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Prioritas</label>
                            <select class="select2 form-control @error('priority') is-invalid @enderror" id="priority"
                                name="priority">
                                <option class="text-capitalize" {{ old('priority') == 'low' ? 'selected' : '' }}
                                    value="low">Low</option>
                                <option class="text-capitalize" {{ old('priority') == 'medium' ? 'selected' : '' }}
                                    value="medium">Medium
                                </option>
                                <option class="text-capitalize" {{ old('priority') == 'high' ? 'selected' : '' }}
                                    value="high">High</option>
                            </select>
                            @error('priority')
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
                            <label for="tim" class="form-label">Anggota Tim</label>
                            <input type="text" id="tim" name="tim"
                                class="form-control @error('tim') is-invalid @enderror" value="{{ old('tim') }}">
                            @error('tim')
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
