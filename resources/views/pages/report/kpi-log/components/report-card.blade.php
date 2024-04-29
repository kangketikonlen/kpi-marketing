<div class="card mb-5">
    <div class="card-header pt-2 pb-2">
        <h4 class="fw-bold m-0">Report</h4>
    </div>
    <div class="card-body table-responsive">
        @if (session('alert'))
            @php $status = session('alert')["status"] @endphp
            @php $message = session('alert')["message"] @endphp
            <x-alert :status="$status" :message="$message" />
        @endif
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-nowrap">Karyawan</th>
                    <th scope="col" class="text-nowrap text-end">Target</th>
                    <th scope="col" class="text-nowrap text-end">Aktual</th>
                    <th scope="col" class="text-nowrap text-end">Pencapaian</th>
                    <th scope="col" class="text-nowrap text-end">Bobot</th>
                    <th scope="col" class="text-nowrap text-end">Late</th>
                    <th scope="col" class="text-nowrap text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                @if (count($performances) == 0)
                    <tr>
                        <td colspan="8" class="text-center text-muted">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($performances as $data)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $data['name'] }}</td>
                            <td class="align-middle text-end">{{ number_format($data['report_target']) }}</td>
                            <td class="align-middle text-end">{{ number_format($data['report_actual_target']) }}</td>
                            <td class="align-middle text-end">{{ number_format($data['report_achivement']) }}%</td>
                            <td class="align-middle text-end">{{ number_format($data['report_weight']) }}%</td>
                            <td class="align-middle text-end">{{ number_format($data['report_late']) }}%</td>
                            <td class="align-middle text-end">{{ number_format($data['report_weight_total']) }}%</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
