@php
    $html_tag_data = [];
    $title = 'Formulir Edit Karyawan';
    $description = 'Edit Karyawan';
    $url = '/master/employee/' . $employee->id;
    $breadcrumbs = ['/' => 'Home', $url => 'Edit Karyawan'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        @include('_layout/breadcrumb')
        <!-- Title End -->

        <!-- Form Start -->
        <form method="POST" action="{{ $url }}/update" class="card mb-5 tooltip-end-top">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="fullname">
                                Nama
                                @error('fullname')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" id="fullname" name="fullname"
                                value="{{ $employee->fullname }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end pt-3 pb-3">
                <x-buttons.submit />
            </div>
        </form>
        <!-- Form End -->
    </div>
@endsection
