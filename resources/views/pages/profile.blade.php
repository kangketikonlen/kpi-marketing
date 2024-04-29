@php
    $html_tag_data = [];
    $title = 'Edit Profile ' . $user->name;
    $description = 'Profile ' . $user->name;
    $url = '/profile';
    $breadcrumbs = ['/' => 'Home'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/singleimageupload.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/profile.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @include('_layout/breadcrumb')
                <!-- Form Start -->
                <form method="POST" action="{{ $url }}/update" class="card mb-5 tooltip-end-top"
                    enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if (session('alert'))
                            @php $status = session('alert')["status"] @endphp
                            @php $message = session('alert')["message"] @endphp
                            <x-alert :status="$status" :message="$message" />
                        @endif
                        <div class="row g-3 mb-3">
                            <div class="col text-center">
                                @error('picture')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="position-relative d-inline-block" id="pictureImageUpload">
                                    <img src="{{ $user->picture }}" alt="alternate text"
                                        class="rounded-xl border border-separator-light border-4 sw-20 sh-20">
                                    <button
                                        class="btn btn-sm btn-icon btn-icon-only btn-separator-light rounded-xl position-absolute e-0 b-0"
                                        type="button">
                                        <i data-acorn-icon="upload"></i>
                                    </button>
                                    <input name="picture" class="file-upload d-none" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <div class="w-100">
                                    <label class="form-label" for="name">
                                        Nama
                                        @error('name')
                                            <span class="text-danger"><br />{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input class="form-control" autocomplete="off" id="name" name="name"
                                        value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100">
                                    <label class="form-label" for="username">
                                        Username
                                        @error('username')
                                            <span class="text-danger"><br />{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <input class="form-control" autocomplete="off" name="username"
                                        value="{{ $user->username }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center pt-3 pb-3">
                        <x-buttons.submit />
                        <a href="{{ $url }}/reset"
                            class="btn btn-outline-danger btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                            <i class="fa fa-key"></i> Reset Password
                        </a>
                    </div>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
@endsection
