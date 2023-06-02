@extends('layouts.master')

@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <h1 class="text-dark fw-bold my-1 fs-2">
                    Laporan </h1>

                <ul class="breadcrumb fw-semibold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        Laporan
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class="container-xxl">
            <div class="card mb-4">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <strong>Laporan Permintaan</strong>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('laporan.permintaan') }}" method="POST" class="row permintaan">
                        @csrf
                        <div class="col-md-5">
                            <label class="required fs-6 fw-semibold mb-2">Tanggal Awal</label>
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
                                <input class="form-control form-control-solid ps-12" value="{{ now()->format('Y-m-d') }}"
                                    placeholder="Select a date" name="start_date" />
                                <!--end::Datepicker-->
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label class="required fs-6 fw-semibold mb-2">Tanggal Akhir</label>
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
                                <input class="form-control form-control-solid ps-12" value="{{ now()->format('Y-m-d') }}"
                                    placeholder="Select a date" name="end_date" />
                                <!--end::Datepicker-->
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mt-9">Download</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <strong>Laporan Pemesanan</strong>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('laporan.pemesanan') }}" method="POST" class="row pemesanan">
                        @csrf
                        <div class="col-md-5">
                            <label class="required fs-6 fw-semibold mb-2">Tanggal Awal</label>
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
                                <input class="form-control form-control-solid ps-12" value="{{ now()->format('Y-m-d') }}"
                                    placeholder="Select a date" name="start_date" />
                                <!--end::Datepicker-->
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label class="required fs-6 fw-semibold mb-2">Tanggal Akhir</label>
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
                                <input class="form-control form-control-solid ps-12" value="{{ now()->format('Y-m-d') }}"
                                    placeholder="Select a date" name="end_date" />
                                <!--end::Datepicker-->
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mt-9">Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.permintaan input[name="start_date"]').flatpickr({
                dateFormat: "Y-m-d",
            });
            $('.permintaan input[name="end_date"]').flatpickr({
                dateFormat: "Y-m-d",
            });
            $('.pemesanan input[name="start_date"]').flatpickr({
                dateFormat: "Y-m-d",
            });
            $('.pemesanan input[name="end_date"]').flatpickr({
                dateFormat: "Y-m-d",
            });
        });
    </script>
@endpush
