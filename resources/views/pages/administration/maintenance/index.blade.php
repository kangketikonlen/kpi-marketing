@php
    $html_tag_data = [];
    $title = 'Data Maintenance';
    $description = 'View Maintenance';
    $url = '/administration/maintenance';
    $breadcrumbs = ['/' => 'Home'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        @include('_layout/breadcrumb')
        <!-- Title and Top Buttons End -->

        <!-- Item List Start -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mb-5">
                    <div class="card-body text-center">
                        @if (session('alert'))
                            @php $status = session('alert')["status"] @endphp
                            @php $message = session('alert')["message"] @endphp
                            <x-alert :status="$status" :message="$message" />
                        @endif
                        <h4 class="fw-bold">{{ $appInfo->name }}</h4>
                        <p class="text-muted">{{ $appInfo->description }}</p>
                        @if ($appInfo->is_maintenance)
                            <a href="{{ $url }}/process" class="btn btn-danger">
                                Maintenance
                                <span class="badge bg-light">Active</span>
                            </a>
                        @else
                            <a href="{{ $url }}/process" class="btn btn-success">
                                Maintenance
                                <span class="badge bg-light">Inactive</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Item List End -->
    </div>
@endsection
