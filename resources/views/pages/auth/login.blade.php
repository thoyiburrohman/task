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
@section('title', 'Login')
@section('content')
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ route('login') }}" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                <h2>PT. Odyca Bangun Pratama</h2>
                            </a>
                            <form action="{{ route('authentication') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="password" class="form-label">Password</label>
                                        <button id="passwordCheck" type="button" class="btn "><i id="passwordIcon"
                                                class="icon-hover ti ti-eye-off"></i></button>
                                    </div>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-8 mb-2">Sign In</button>


                            </form>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <p class="fs-4 mb-0 text-dark">Already have not an Account?</p>
                                <a href="{{ route('register.page') }}" class="text-primary text-center fw-medium ms-2">Sign
                                    Up</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
