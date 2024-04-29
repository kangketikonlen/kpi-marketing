@php
    $title = 'Login Page';
    $description = 'Login Page';
@endphp
@extends('layout-guest', ['title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
@endsection

@section('content_left')
    <div class="min-h-100 d-flex align-items-center">
        <div class="w-100 w-lg-75 w-xxl-75 pt-4 rounded-end opacity-75 bg-light">
            <div>
                <div class="mb-4">
                    <h1 class="display-3 px-6 text-dark fw-bold m-0">{{ $info->name }} </h1>
                    <h1 class="display-6 px-6 text-dark fw-bold m-0">{{ $institution->name }}</h1>
                </div>
                <p class="h6 text-dark lh-1-5 mb-4 px-6">
                    {{ $info->description }}
                </p>
                @if (!empty($info->sponsor))
                    <img src="{{ $info->sponsor_logo }}" alt="sponsor_logo" class="sh-4">
                @endif
                <div class="mb-4">
                    <p class="px-6 text-dark fw-bold m-0">
                        &copy; 2023 | {{ $info->registered }} | {{ $institution->address }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content_right')
    <div
        class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-50 px-5 text-center">
            <a href="/">
                <img src="{{ $institution->logo }}" alt="logo-default">
            </a>
            <div class="mb-4">
                <h2 class="cta-1 mb-0 text-primary">Portal Login,</h2>
                <h2 class="cta-4 text-primary">Kunci Masuk ke Dunia Online</h2>
            </div>
            <div class="mb-4">
                <p class="h6">Silahkan login untuk masuk ke sistem.</p>
            </div>
            <div>
                @if ($errors->any())
                    {!! implode('', $errors->all('<div class="mb-2 text-danger">:message</div>')) !!}
                @endif
                <form method="POST" action="/auth" id="loginForm" class="tooltip-end-bottom" novalidate>
                    @csrf
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control" placeholder="Username" name="username" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input class="form-control pe-7" name="password" type="password" placeholder="Password" />
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-lg btn-primary">Login</button>
                    </div>
                </form>
            </div>
            <div class="mt-5 text-center">
                Coded with
                <i class="fa fa-heart text-danger"></i> by
                <a href="{{ $info->dev_url }}">{{ $info->dev }}</a><br />
                &copy; {{ $info->registered }}
            </div>
        </div>
    </div>
@endsection
