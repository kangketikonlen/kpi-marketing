<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center flex-column mb-4">
            <div class="d-flex align-items-center flex-column">
                <div class="sw-13 position-relative mb-3">
                    <img src="{{ session('picture') }}" class="img-fluid rounded-xl" alt="thumb">
                </div>
                <div class="h5 mb-0">
                    {{ session('name') }}
                </div>
                <div class="text-muted">
                    {{ session('role_description') }}
                    {{-- {{ implode(' | ', $positionUsers->pluck('position.description')->toArray()) }} --}}
                </div>
            </div>
        </div>
        {{-- <div class="mb-5">
            <p class="text-small text-muted mb-2">IDENTITAS PRIBADI</p>
            <div class="row g-0 mb-2">
                <div class="col-auto">
                    <div class="sw-3 me-1 text-center">
                        <i class="acorn-icons fa fa-id-card text-primary"></i>
                    </div>
                </div>
                <div class="col text-alternate">{{ $data->citizen_identification_number }}</div>
            </div>
            <div class="row g-0 mb-2">
                <div class="col-auto">
                    <div class="sw-3 me-1 text-center">
                        <i class="acorn-icons fa fa-solid fa-cake-candles text-primary"></i>
                    </div>
                </div>
                <div class="col text-alternate">
                    {{ $data->place_of_birth }},
                    {{ \Carbon\Carbon::parse($data->date_of_birth)->locale('id')->isoFormat('D MMMM Y') }}
                </div>
            </div>
            <div class="row g-0 mb-2">
                <div class="col-auto">
                    <div class="sw-3 me-1 text-center">
                        <i class="acorn-icons fa fa-solid fa-venus-mars text-primary"></i>
                    </div>
                </div>
                <div class="col text-alternate">{{ $data->gender }}</div>
            </div>
        </div>
        <div class="mb-5">
            <p class="text-small text-muted mb-2">KONTAK</p>
            <div class="row g-0 mb-2">
                <div class="col-auto">
                    <div class="sw-3 me-1 text-center">
                        <i class="acorn-icons fa fa-solid fa-phone text-primary"></i>
                    </div>
                </div>
                <div class="col text-alternate">{{ $data->phone_number }}</div>
            </div>
            <div class="row g-0 mb-2">
                <div class="col-auto">
                    <div class="sw-3 me-1 text-center">
                        <i class="acorn-icons fa fa-solid fa-mobile text-primary"></i>
                    </div>
                </div>
                <div class="col text-alternate">{{ $data->mobile_phone_number }}</div>
            </div>
            <div class="row g-0 mb-2">
                <div class="col-auto">
                    <div class="sw-3 me-1 text-center">
                        <i class="acorn-icons fa fa-solid fa-at text-primary"></i>
                    </div>
                </div>
                <div class="col text-alternate">{{ $data->email }}</div>
            </div>
        </div> --}}
    </div>
</div>
