<div class="d-flex align-items-center text-end">
    <a href="{{ route('pemesanan.edit', $pemesanan->kode) }}"
        class="btn btn-sm btn-info btn-active-light-primary">Edit</a>
    <button class="btn btn-sm btn-danger btn-active-light-danger ms-1" data-kode="{{ $pemesanan->kode }}"
        data-kt-pemesanan-table-filter="delete_row">Delete</button>
</div>
