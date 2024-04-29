@php
    $html_tag_data = [];
    $title = 'Formulir Instansi';
    $description = 'Edit Instansi';
    $url = '/setting/institution';
    $breadcrumbs = ['/' => 'Home', $url => 'View Instansi'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/singleimageupload.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/setting/institution.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        @include('_layout/breadcrumb')
        <!-- Title End -->

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
                    <div class="col">
                        @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="position-relative d-inline-block" id="logoImageUpload">
                            <img src="{{ $institution->logo }}" alt="alternate text"
                                class="rounded-xl border border-separator-light border-4 sw-20 sh-20">
                            <button
                                class="btn btn-sm btn-icon btn-icon-only btn-separator-light rounded-xl position-absolute e-0 b-0"
                                type="button">
                                <i data-acorn-icon="upload"></i>
                            </button>
                            <input name="logo" class="file-upload d-none" type="file">
                        </div>
                    </div>
                    <div class="col">
                        @error('background')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="position-relative d-inline-block" id="backgroundImageUpload">
                            <img src="{{ $institution->background }}" alt="alternate text"
                                class="rounded-xl border border-separator-light border-4 sw-80 sh-20">
                            <button
                                class="btn btn-sm btn-icon btn-icon-only btn-separator-light rounded-xl position-absolute e-0 b-0"
                                type="button">
                                <i data-acorn-icon="upload"></i>
                            </button>
                            <input name="background" class="file-upload d-none" type="file">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="name">
                                Nama Instansi
                                @error('name')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="name" value="{{ $institution->name }}">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="address">
                                Alamat Instansi
                                @error('address')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="address"
                                value="{{ $institution->address }}">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="website">
                                Website
                                @error('website')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="website"
                                value="{{ $institution->website }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="contact">
                                Nomor Telpon
                                @error('contact')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="contact"
                                value="{{ $institution->contact }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="email">
                                Email
                                @error('email')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="email" class="form-control" autocomplete="off" name="email"
                                value="{{ $institution->email }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end pt-3 pb-3">
                <button type="submit"class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                    <i data-acorn-icon="save" class="icon"></i>
                    <span>Simpan</span>
                </button>
            </div>
        </form>
        <!-- Form End -->
    </div>
@endsection
