<div class="d-flex align-items-center text-end">
    @role('bendahara')
        <a href="{{ route('pemesanan.edit', $pemesanan->kode) }}"
            class="btn btn-sm btn-info btn-active-light-primary">Edit</a>
        <button class="btn btn-sm btn-danger btn-active-light-danger ms-1" data-kode="{{ $pemesanan->kode }}"
            data-kt-pemesanan-table-filter="delete_row">Delete</button>
    @endrole
    <a href="{{ route('pemesanan.show', $pemesanan->kode) }}"
        class="btn btn-sm btn-primary btn-active-light-primary ms-1">Detail</a>
    @role('kepala_dinas')
        <button class="btn btn-sm btn-success btn-active-light-danger ms-1" data-kode="{{ $pemesanan->kode }}"
            data-kt-pemesanan-table-filter="setuju_row">Setujui</button>
        <button class="btn btn-sm btn-danger btn-active-light-danger ms-1" data-kode="{{ $pemesanan->kode }}"
            data-kt-pemesanan-table-filter="tolak_row">Tolak</button>
    @endrole
</div>
