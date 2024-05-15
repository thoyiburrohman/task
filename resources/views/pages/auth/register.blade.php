@extends('layouts.auth')
@push('styles')
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#passwordCheck').click(function() {
                if ($('#password').attr('type') == 'password') {
                    $('#password').attr('type', 'text');
                    $('#passwordIcon').removeClass('ti-eye-off');
                    $('#passwordIcon').addClass('ti-eye');
                    $('#passwordIcon').addClass('text-primary');
                } else {
                    $('#password').attr('type', 'password');
                    $('#passwordIcon').removeClass('ti-eye');
                    $('#passwordIcon').removeClass('text-primary');
                    $('#passwordIcon').addClass('ti-eye-off');
                }
            });
        });
    </script>
@endpush
@section('title', 'Register')
@section('content')
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="../main/index.html" class="text-nowrap logo-img text-center d-block mb-3 w-100">
                                <img src="{{ asset('images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                            </a>
                            <form action="{{ route('register.user') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        aria-describedby="textHelp" value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        aria-describedby="emailHelp" value="{{ old('email') }}">
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="password" class="form-label">Password</label>
                                        <button id="passwordCheck" type="button" class="btn "><i id="passwordIcon"
                                                class="icon-hover ti ti-eye-off"></i></button>
                                    </div>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 mb-2">Sign
                                    Up</button>

                            </form>

                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                <a href="{{ route('login') }}" class="text-primary text-center fw-medium ms-2">Sign
                                    In</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
