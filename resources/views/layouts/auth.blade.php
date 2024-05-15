<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/css/sweetalert.min.css') }}">
    @stack('styles')
    <title>@yield('title') | PT. Odyca Bangun Pratma</title>
</head>

<body>
    @if (session()->has('success'))
        <div id="flash" data-flash="{{ session('success') }}">
        </div>
    @endif
    @if (session()->has('error'))
        <div id="flashError" data-flash="{{ session('error') }}">
        </div>
    @endif
    <!-- Preloader -->
    <div class="preloader">
        <img src="../assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        @yield('content')


    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/theme/app.init.js') }}"></script>
    <script src="{{ asset('js/theme/theme.js') }}"></script>
    <script src="{{ asset('js/theme/app.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/js/sweetalert.min.js') }}"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script>
        var flash = $('#flash').data('flash');
        if (flash) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: flash
            })
        };
        var flashError = $('#flashError').data('flash');
        if (flashError) {
            Swal.fire({
                icon: 'warning',
                title: 'Gagal',
                text: flashError
            })
        };
    </script>
    @stack('scripts')
</body>

</html>
