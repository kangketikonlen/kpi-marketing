<div class="card mb-5">
    <div class="card-header pt-2 pb-2">
        <h4 class="fw-bold m-0">Tasklist Ontime & Late</h4>
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
                    <th scope="col" class="text-nowrap text-end">Ontime</th>
                    <th scope="col" class="text-nowrap text-end">Late</th>
                    <th scope="col" class="text-nowrap text-end">Persentase Ontime</th>
                    <th scope="col" class="text-nowrap text-end">Persentase Late</th>
                </tr>
            </thead>
            <tbody>
                @if (count($tasklistPerformances) == 0)
                    <tr>
                        <td colspan="8" class="text-center text-muted">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($tasklistPerformances as $data)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $data['name'] }}</td>
                            <td class="align-middle text-end">{{ number_format($data['ontime_total']) }}</td>
                            <td class="align-middle text-end">{{ number_format($data['late_total']) }}</td>
                            <td class="align-middle text-end">{{ number_format($data['ontime_percentage']) }}%</td>
                            <td class="align-middle text-end">{{ number_format($data['late_percentage']) }}%</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
