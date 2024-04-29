@php
    $html_tag_data = [];
    $title = 'Data Report KPI';
    $description = 'View Report KPI';
    $url = '/report/kpi-log';
    $breadcrumbs = ['/' => 'Home'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/Chart.bundle.min.js"></script>
    <script src="/js/vendor/chartjs-plugin-datalabels.js"></script>
@endsection

@section('js_page')
    <script>
        // JavaScript code to create the chart
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('performanceChart').getContext('2d');
            var chartData = @json(
                $performanceChartData,
                JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);;

            var performanceChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        @include('_layout/breadcrumb')
        <!-- Title and Top Buttons End -->

        <!-- Item List Start -->
        @include('pages.report.kpi-log.components.sales-card')
        @include('pages.report.kpi-log.components.report-card')
        @include('pages.report.kpi-log.components.kpi-chart-card')
        <!-- Item List End -->
    </div>
@endsection
