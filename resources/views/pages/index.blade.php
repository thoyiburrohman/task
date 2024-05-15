@extends('layouts.app')
@section('title', 'Dashboard')
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net/css/dataTables.bootstrap5.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(function() {
            //
            // Carousel
            //
            $(".counter-carousel").owlCarousel({
                loop: true,
                rtl: false,
                margin: 30,
                mouseDrag: true,
                nav: false,
                responsive: {
                    0: {
                        items: 2,
                        loop: true,
                    },
                    576: {
                        items: 2,
                        loop: true,
                    },
                    768: {
                        items: 3,
                        loop: true,
                    },
                    1200: {
                        items: 4,
                        loop: true,
                    },
                    1400: {
                        items: 4,
                        loop: true,
                    },
                },
            });
            // =====================================
            // Profit
            // =====================================
            var chart = {
                series: [{
                        name: "Eanings this month",
                        data: [1.5, 2.7, 2.2, 3.6, 1.5, 1.0],
                    },
                    {
                        name: "Expense this month",
                        data: [-1.8, -1.1, -2.5, -1.5, -0.6, -1.8],
                    },
                ],
                chart: {
                    toolbar: {
                        show: false,
                    },
                    type: "bar",
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                    height: 320,
                    stacked: true,
                },
                colors: ["var(--bs-primary)", "var(--bs-secondary)"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        barHeight: "60%",
                        columnWidth: "20%",
                        borderRadius: [6],
                        borderRadiusApplication: "end",
                        borderRadiusWhenStacked: "all",
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false,
                },
                grid: {
                    borderColor: "rgba(0,0,0,0.1)",
                    strokeDashArray: 3,
                    xaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },
                yaxis: {
                    min: -5,
                    max: 5,
                    title: {
                        // text: 'Age',
                    },
                },
                xaxis: {
                    axisBorder: {
                        show: false,
                    },
                    categories: [
                        "16/08",
                        "17/08",
                        "18/08",
                        "19/08",
                        "20/08",
                        "21/08",
                        "22/08",
                    ],
                },
                yaxis: {
                    tickAmount: 4,
                },
                tooltip: {
                    theme: "dark",
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart"), chart);
            chart.render();

            // =====================================
            // Breakup
            // =====================================
            var breakup = {
                color: "#adb5bd",
                series: [38, 40, 25],
                labels: ["2022", "2021", "2020"],
                chart: {
                    width: 180,
                    type: "donut",
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                },
                plotOptions: {
                    pie: {
                        startAngle: 0,
                        endAngle: 360,
                        donut: {
                            size: "75%",
                        },
                    },
                },
                stroke: {
                    show: false,
                },

                dataLabels: {
                    enabled: false,
                },

                legend: {
                    show: false,
                },
                colors: ["var(--bs-primary)", "#ecf2ff", "var(--bs-card-bg)"],

                responsive: [{
                    breakpoint: 991,
                    options: {
                        chart: {
                            width: 120,
                        },
                    },
                }, ],
                tooltip: {
                    theme: "dark",
                    fillSeriesColor: false,
                },
            };

            var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
            chart.render();

            // =====================================
            // Earning
            // =====================================
            var earning = {
                chart: {
                    id: "sparkline3",
                    type: "area",
                    height: 60,
                    sparkline: {
                        enabled: true,
                    },
                    group: "sparklines",
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                },
                series: [{
                    name: "Earnings",
                    color: "var(--bs-secondary)",
                    data: [25, 66, 20, 40, 12, 58, 20],
                }, ],
                stroke: {
                    curve: "smooth",
                    width: 2,
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0,
                        inverseColors: false,
                        opacityFrom: 0.15,
                        opacityTo: 0,
                        stops: [20, 180],
                    },
                    opacity: 0.5,
                },

                markers: {
                    size: 0,
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: true,
                        position: "right",
                    },
                    x: {
                        show: false,
                    },
                },
            };
            new ApexCharts(document.querySelector("#earning"), earning).render();

            // =====================================
            // Salary
            // =====================================
            var salary = {
                series: [{
                    name: "Employee Salary",
                    data: [20, 15, 30, 25, 10, 15],
                }, ],

                chart: {
                    toolbar: {
                        show: false,
                    },
                    height: 260,
                    type: "bar",
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                },
                colors: [
                    "var(--bs-primary-bg-subtle)",
                    "var(--bs-primary-bg-subtle)",
                    "var(--bs-primary)",
                    "var(--bs-primary-bg-subtle)",
                    "var(--bs-primary-bg-subtle)",
                    "var(--bs-primary-bg-subtle)",
                ],
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        columnWidth: "45%",
                        distributed: true,
                        endingShape: "rounded",
                    },
                },

                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false,
                },
                grid: {
                    yaxis: {
                        lines: {
                            show: false,
                        },
                    },
                    xaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },
                xaxis: {
                    categories: [
                        ["Apr"],
                        ["May"],
                        ["June"],
                        ["July"],
                        ["Aug"],
                        ["Sept"]
                    ],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    labels: {
                        show: false,
                    },
                },
                tooltip: {
                    theme: "dark",
                },
            };

            var chart = new ApexCharts(document.querySelector("#salary"), salary);
            chart.render();

            // =====================================
            // Customers
            // =====================================
            var customers = {
                chart: {
                    id: "sparkline3",
                    type: "area",
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                    height: 60,
                    sparkline: {
                        enabled: true,
                    },
                    group: "sparklines",
                },
                series: [{
                    name: "Customers",
                    color: "var(--bs-secondary)",
                    data: [30, 25, 35, 20, 30, 40],
                }, ],
                stroke: {
                    curve: "smooth",
                    width: 2,
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0,
                        inverseColors: false,
                        opacityFrom: 0.12,
                        opacityTo: 0,
                        stops: [20, 180],
                    },
                },

                markers: {
                    size: 0,
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: true,
                        position: "right",
                    },
                    x: {
                        show: false,
                    },
                },
            };
            new ApexCharts(document.querySelector("#customers"), customers).render();

            // =====================================
            // Projects
            // =====================================
            var projects = {
                series: [{
                    name: "",
                    data: [4, 10, 9, 7, 9, 10, 11, 8, 10, 9],
                }, ],
                chart: {
                    type: "bar",
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                    height: 60,

                    resize: true,
                    barColor: "#fff",
                    toolbar: {
                        show: false,
                    },
                    sparkline: {
                        enabled: true,
                    },
                },
                colors: ["var(--bs-primary)"],
                grid: {
                    show: false,
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        startingShape: "flat",
                        endingShape: "flat",
                        columnWidth: "60%",
                        barHeight: "20%",
                        endingShape: "rounded",
                        distributed: true,
                        borderRadius: 2,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 2.5,
                    colors: ["rgba(0,0,0,0.01)"],
                },
                xaxis: {
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                    },
                },
                yaxis: {
                    labels: {
                        show: false,
                    },
                },
                axisBorder: {
                    show: false,
                },
                fill: {
                    opacity: 1,
                },
                tooltip: {
                    theme: "dark",
                    style: {
                        fontSize: "12px",
                    },
                    x: {
                        show: false,
                    },
                },
            };

            var chart_column_basic = new ApexCharts(
                document.querySelector("#projects"),
                projects
            );
            chart_column_basic.render();

            // =====================================
            // Stats
            // =====================================
            var stats = {
                chart: {
                    id: "sparkline3",
                    type: "area",
                    height: 180,
                    sparkline: {
                        enabled: true,
                    },
                    group: "sparklines",
                    fontFamily: "inherit",
                    foreColor: "#adb0bb",
                },
                series: [{
                    name: "Weekly Stats",
                    color: "var(--bs-primary)",
                    data: [5, 15, 10, 20],
                }, ],
                stroke: {
                    curve: "smooth",
                    width: 2,
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0,
                        inverseColors: false,
                        opacityFrom: 0.2,
                        opacityTo: 0,
                        stops: [20, 180],
                    },
                },

                markers: {
                    size: 0,
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: true,
                        position: "right",
                    },
                    x: {
                        show: false,
                    },
                },
            };
            new ApexCharts(document.querySelector("#stats"), stats).render();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#datatables').DataTable({
                language: {
                    paginate: {
                        previous: '‹',
                        next: '›',
                    }
                }
            });
        });
    </script>
@endpush
@section('content')


    <div class="container-fluid">
        <!--  Owl carousel -->
        <div class="owl-carousel counter-carousel owl-theme">
            <div class="item">
                <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="text-primary">
                                <i class="ti ti-list"></i>
                            </h1>
                            <h2 class="fw-semibold fs-3 text-primary mb-1">
                                Projects
                            </h2>
                            <h5 class="fw-semibold text-primary mb-0">{{ count($projects) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="text-warning"><i class="ti ti-medal"></i>
                            </h1>
                            <h2 class="fw-semibold fs-3 text-warning mb-1">Complete</h2>
                            <h5 class="fw-semibold text-warning mb-0">{{ count($projectComplete) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="text-info"><i class="ti ti-status-change"></i>
                            </h1>
                            <h2 class="fw-semibold fs-3 text-info mb-1">Progress</h2>
                            <h5 class="fw-semibold text-info mb-0">{{ count($projectProgress) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-success-subtle shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="text-success"><i class="ti ti-x"></i>
                            </h1>
                            <h2 class="fw-semibold fs-3 text-success mb-1">Cancel</h2>
                            <h5 class="fw-semibold text-success mb-0">{{ count($projectCancel) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row mb-3">
                            <h1>Performance Progress</h1>
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered text-nowrap align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">Nama Proyek</th>
                                        <th class="bg-primary text-white">Status</th>
                                        <th class="bg-primary text-white">Persentase</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($projects as $item)
                                        <tr>
                                            <td class="text-capitalize">{{ $item->name }}</td>
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
                                                @if ($task->where('project_id', $item->id)->count())
                                                    {{ Number::percentage(($taskSelesai->where('project_id', $item->id)->count() / $task->where('project_id', $item->id)->count()) * 100, precision: 0) }}
                                                @else
                                                    0%
                                                @endif
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
