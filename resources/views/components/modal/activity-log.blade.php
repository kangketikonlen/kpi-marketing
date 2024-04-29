<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-3 pt-3">
                <h5 class="modal-title" id="filterModalLabel">
                    <i class="fa fa-filter"></i>
                    Filter Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="GET" action="{{ $link }}">
                <div class="modal-body text-start pt-2 pb-2">
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <div class="w-100">
                                <label class="form-label">
                                    Tanggal Awal
                                    @error('dateStart')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="date" class="form-control" autocomplete="off" name="dateStart">
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100">
                                <label class="form-label">
                                    Tanggal Akhir
                                    @error('dateEnd')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="date" class="form-control" autocomplete="off" name="dateEnd">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-3 pt-3">
                    <button type="submit" class="btn btn-primary w-100 m-0">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
