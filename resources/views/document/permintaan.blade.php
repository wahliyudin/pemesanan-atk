<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <title>Permintaan</title>
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2" class="text-center" style="vertical-align: middle;">Kode</th>
                <th rowspan="2" class="text-center" style="vertical-align: middle;">Pemohon</th>
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
            @php
                $totalJumlah = 0;
            @endphp
            @foreach ($permintaans as $permintaan)
                @foreach ($permintaan->barangs as $barang)
                    @php
                        $totalJumlah += $barang->pivot->volume * $barang->harga;
                    @endphp
                    <tr>
                        <td>
                            {{ $permintaan->kode }}
                        </td>
                        <td>
                            {{ $permintaan->pemohon?->nama }}
                        </td>
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
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-center">Total</td>
                <td>{{ number_format($totalJumlah, 0, ',', '.') }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
