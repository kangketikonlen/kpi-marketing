<form action="{{ $link }}/{{ $data }}/reset" method="POST" class="d-inline">
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-sm btn-warning">
        <i class="fa fa-history"></i>
    </button>
</form>
