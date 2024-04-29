@isset($breadcrumbs)
    <div class="row">
        <div class="col-12">
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container">
                <div class="row">
                    <!-- Title Start -->
                    <div class="col-12 col-sm-6">
                        <h1 class="mb-0 pb-0 display-4" id="title"><?= $title ?></h1>
                        <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                            <ul class="breadcrumb pt-0">
                                @foreach ($breadcrumbs as $key => $value)
                                    <li class="breadcrumb-item"><a href="{{ url($key) }}">{{ $value }}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <!-- Title End -->

                    <!-- Top Buttons Start -->
                    <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                        <!-- Tour Button Start -->
                        <a href="/dashboard/reset" class="btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto">
                            <!-- <span>Menu Utama</span> -->
                            <i data-acorn-icon="home"></i>
                        </a>
                        &nbsp;
                        <a href="/dashboard/logout" class="btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto">
                            <!-- <span>Logout</span> -->
                            <i class="fa fa-sign-out-alt"></i>
                        </a>
                        &nbsp;
                        <!-- Tour Button End -->
                    </div>
                    <!-- Top Buttons End -->
                </div>
            </div>
            <!-- Title and Top Buttons End -->
        </div>
    </div>
@endisset
