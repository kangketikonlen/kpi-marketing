@php
    $qname = !empty($qname) ? $qname : 'query';
@endphp
<form action="{{ $link }}" method="GET">
    <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
        <input name="{{ $qname }}" class="form-control" placeholder="Search" autocomplete="off"
            value="{{ $query }}" />
        <span class="search-magnifier-icon">
            <i data-acorn-icon="search"></i>
        </span>
        <span class="search-delete-icon d-none">
            <i data-acorn-icon="close"></i>
        </span>
    </div>
</form>
