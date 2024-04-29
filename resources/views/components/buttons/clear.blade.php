<form action="{{ $link }}/clear" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-outline-danger btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
        <i class="fa fa-trash"></i> Bersihkan Riwayat
    </button>
</form>
