@extends('layouts.master')

@section('title', 'Show | Permintaan')

@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <h1 class="text-dark fw-bold my-1 fs-2">
                    Detail Permintaan </h1>
                <ul class="breadcrumb fw-semibold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('permintaan') }}" class="text-muted text-hover-primary">
                            Data Permintaan </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        Detail Permintaan
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="post fs-6 d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="card">
                <div class="card-body">
                    <table class="mb-4">
                        <tbody>
                            <tr>
                                <th>Kode</th>
                                <td class="px-4">:</td>
                                <td>{{ $permintaan->kode }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td class="px-4">:</td>
                                <td>{{ \Carbon\Carbon::make($permintaan->tanggal)->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Pemohon</th>
                                <td class="px-4">:</td>
                                <td>{{ $permintaan->pemohon?->kode . ' - ' . $permintaan->pemohon?->nama }}</td>
                            </tr>
                            <tr>
                                <th>Bendahara</th>
                                <td class="px-4">:</td>
                                <td>{{ $permintaan->pegawai?->kode . ' - ' . $permintaan->pegawai?->nama }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Jenis Barang</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Harga</th>
                                <th colspan="2" class="text-center">Rincian</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Jumlah</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Keterangan</th>
                            </tr>
                            <tr>
                                <th class="text-center">Volume</th>
                                <th class="text-center">Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaan->barangs as $barang)
                                <tr>
                                    <td>
                                        {{ $barang->nama }}
                                    </td>
                                    <td>
                                        {{ number_format($barang->harga, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ $barang->pivot->volume }}
                                    </td>
                                    <td>
                                        {{ $barang->satuan?->nama }}
                                    </td>
                                    <td>
                                        {{ number_format($barang->pivot->volume * $barang->harga, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ $barang->pivot->keterangan }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
