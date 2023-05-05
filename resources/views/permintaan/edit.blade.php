@extends('layouts.master')

@push('css')
@endpush

@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bold my-1 fs-2">
                    Data Permintaan </h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-semibold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        Data Permintaan
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
        </div>
    </div>
@endsection

@section('content')
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class=" container-xxl ">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form action="{{ route('permintaan.update', $permintaan->kode) }}" method="POST" class="row">
                        @method('PUT')
                        @csrf
                        <div class="col-md-4">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Tanggal</label>
                                <!--end::Label-->

                                <div class="position-relative d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <div class="symbol symbol-20px me-4 position-absolute ms-4">
                                        <span class="symbol-label bg-secondary">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon"><svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="2" y="2" width="9" height="9"
                                                        rx="2" fill="currentColor" />
                                                    <rect opacity="0.3" x="13" y="2" width="9"
                                                        height="9" rx="2" fill="currentColor" />
                                                    <rect opacity="0.3" x="13" y="13" width="9"
                                                        height="9" rx="2" fill="currentColor" />
                                                    <rect opacity="0.3" x="2" y="13" width="9"
                                                        height="9" rx="2" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <!--end::Icon-->

                                    <!--begin::Datepicker-->
                                    <input class="form-control form-control-solid ps-12" placeholder="Select a date"
                                        name="tanggal" value="{{ $permintaan->tanggal }}" />
                                    <!--end::Datepicker-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Pemohon</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <select class="form-select form-select-solid" data-control="select2" name="kode_pemohon">
                                    <option disabled selected value="">- Pilih -</option>
                                    @foreach ($pegawais as $item)
                                        <option @selected($permintaan->kode_pemohon == $item->kode) value="{{ $item->kode }}">{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Pegawai</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <select class="form-select form-select-solid" data-control="select2" name="kode_pegawai">
                                    <option disabled selected value="">- Pilih -</option>
                                    @foreach ($pegawais as $item)
                                        <option @selected($permintaan->kode_pegawai == $item->kode) value="{{ $item->kode }}">{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="" data-kt-product="auto-options">
                                <!--begin::Label-->
                                <label class="form-label">Add Product Variations</label>
                                <!--end::Label-->

                                <!--begin::Repeater-->
                                <div id="kt_products">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="kt_products" class="d-flex flex-column gap-3">
                                            @forelse ($permintaan->barangs as $item)
                                                <div data-repeater-item
                                                    class="form-group d-flex flex-wrap align-items-center justify-content-between gap-5">
                                                    <!--begin::Select2-->
                                                    <div class="w-250 w-md-250px">
                                                        <select class="form-select" name="kode_barang"
                                                            data-placeholder="Select a variation"
                                                            data-kt-product="kode_barang">
                                                            <option></option>
                                                            @foreach ($barangs as $barang)
                                                                <option @selected($item->kode == $barang->kode)
                                                                    value="{{ $barang->kode }}">
                                                                    {{ $barang->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--end::Select2-->

                                                    <!--begin::Input-->
                                                    <input type="number" class="form-control mw-250 w-250px" name="volume"
                                                        placeholder="Variation" value="{{ $item->pivot->volume }}" />
                                                    <!--end::Input-->

                                                    <textarea name="keterangan" class="form-control w-300 w-md-300px" placeholder="Keterangan">{{ $item->pivot->keterangan }}</textarea>

                                                    <button type="button" data-repeater-delete
                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                        <span class="svg-icon svg-icon-1"><svg width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="7.05025" y="15.5356"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-45 7.05025 15.5356)"
                                                                    fill="currentColor" />
                                                                <rect x="8.46447" y="7.05029" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(45 8.46447 7.05029)"
                                                                    fill="currentColor" />
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </div>
                                            @empty
                                                <div data-repeater-item
                                                    class="form-group d-flex flex-wrap align-items-center justify-content-between gap-5">
                                                    <!--begin::Select2-->
                                                    <div class="w-250 w-md-250px">
                                                        <select class="form-select" name="kode_barang"
                                                            data-placeholder="Select a variation"
                                                            data-kt-product="kode_barang">
                                                            <option></option>
                                                            @foreach ($barangs as $barang)
                                                                <option value="{{ $barang->kode }}">
                                                                    {{ $barang->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--end::Select2-->

                                                    <!--begin::Input-->
                                                    <input type="number" class="form-control mw-250 w-250px"
                                                        name="volume" placeholder="Variation" />
                                                    <!--end::Input-->

                                                    <textarea name="keterangan" class="form-control w-300 w-md-300px" placeholder="Keterangan"></textarea>

                                                    <button type="button" data-repeater-delete
                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                        <span class="svg-icon svg-icon-1"><svg width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="7.05025" y="15.5356"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-45 7.05025 15.5356)"
                                                                    fill="currentColor" />
                                                                <rect x="8.46447" y="7.05029" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(45 8.46447 7.05029)"
                                                                    fill="currentColor" />
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    <!--end::Form group-->

                                    <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                        <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                            <span class="svg-icon svg-icon-2"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="11" y="18" width="12"
                                                        height="2" rx="1" transform="rotate(-90 11 18)"
                                                        fill="currentColor" />
                                                    <rect x="6" y="11" width="12" height="2"
                                                        rx="1" fill="currentColor" />
                                                </svg></span>
                                            <!--end::Svg Icon--> Add another variation
                                        </button>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                            </div>
                        </div>
                        <div class="col-md-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/permintaan/add.js') }}"></script>
    <script>
        var tanggal = $(document.querySelector('[name="tanggal"]'));
        tanggal.flatpickr({
            dateFormat: "Y-m-d",
        });
    </script>
@endpush
