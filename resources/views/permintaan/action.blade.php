<div class="d-flex align-items-center text-end">
    <a href="{{ route('permintaan.edit', $permintaan->kode) }}"
        class="btn btn-sm btn-info btn-active-light-primary">Edit</a>
    <button class="btn btn-sm btn-danger btn-active-light-danger ms-1" data-kode="{{ $permintaan->kode }}"
        data-kt-permintaan-table-filter="delete_row">Delete</button>
    <a href="{{ route('permintaan.show', $permintaan->kode) }}"
        class="btn btn-sm btn-primary btn-active-light-primary ms-1">Detail</a>
</div>
