<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        :root {
            --bs-xs: 0;
            --bs-sm: 576px;
            --bs-md: 768px;
            --bs-lg: 992px;
            --bs-xl: 1200px;
            --bs-xxl: 1400px;
            --bs-scrollbar-size: 5px;
            --bs-scrollbar-overlay-size: 19px;
            --bs-scrollbar-overlay-space: 7px;
            --bs-text-muted: #565674;
            --bs-gray-100: #1b1b29;
            --bs-gray-100-rgb: 27, 27, 41;
            --bs-gray-200: #2B2B40;
            --bs-gray-200-rgb: 43, 43, 64;
            --bs-gray-300: #323248;
            --bs-gray-300-rgb: 50, 50, 72;
            --bs-gray-400: #474761;
            --bs-gray-400-rgb: 71, 71, 97;
            --bs-gray-500: #565674;
            --bs-gray-500-rgb: 86, 86, 116;
            --bs-gray-600: #6D6D80;
            --bs-gray-600-rgb: 109, 109, 128;
            --bs-gray-700: #92929F;
            --bs-gray-700-rgb: 146, 146, 159;
            --bs-gray-800: #CDCDDE;
            --bs-gray-800-rgb: 205, 205, 222;
            --bs-gray-900: #FFFFFF;
            --bs-gray-900-rgb: 255, 255, 255;
            --bs-white: #ffffff;
            --bs-light: #2B2B40;
            --bs-primary: #00A3FF;
            --bs-success: #50CD89;
            --bs-info: #7239EA;
            --bs-warning: #FFC700;
            --bs-danger: #F1416C;
            --bs-dark: #FFFFFF;
            --bs-secondary: #323248;
            --bs-primary-active: #008BD9;
            --bs-secondary-active: #474761;
            --bs-light-active: #323248;
            --bs-success-active: #47BE7D;
            --bs-info-active: #5014D0;
            --bs-warning-active: #F1BC00;
            --bs-danger-active: #D9214E;
            --bs-dark-active: white;
            --bs-primary-light: #212E48;
            --bs-success-light: #1C3238;
            --bs-info-light: #2F264F;
            --bs-warning-light: #392F28;
            --bs-danger-light: #3A2434;
            --bs-dark-light: #2B2B40;
            --bs-secondary-light: #1b1b29;
            --bs-primary-inverse: #FFFFFF;
            --bs-secondary-inverse: #92929F;
            --bs-light-inverse: #7E8299;
            --bs-success-inverse: #FFFFFF;
            --bs-info-inverse: #FFFFFF;
            --bs-warning-inverse: #FFFFFF;
            --bs-danger-inverse: #FFFFFF;
            --bs-dark-inverse: #1b1b29;
            --bs-white-rgb: 255, 255, 255;
            --bs-light-rgb: 43, 43, 64;
            --bs-primary-rgb: 0, 163, 255;
            --bs-success-rgb: 80, 205, 137;
            --bs-info-rgb: 114, 57, 234;
            --bs-warning-rgb: 255, 199, 0;
            --bs-danger-rgb: 241, 65, 108;
            --bs-dark-rgb: 255, 255, 255;
            --bs-secondary-rgb: 50, 50, 72;
            --bs-text-white: #ffffff;
            --bs-text-primary: #00A3FF;
            --bs-text-secondary: #323248;
            --bs-text-light: #2B2B40;
            --bs-text-success: #50CD89;
            --bs-text-info: #7239EA;
            --bs-text-warning: #FFC700;
            --bs-text-danger: #F1416C;
            --bs-text-dark: #FFFFFF;
            --bs-text-muted: #565674;
            --bs-text-gray-100: #1b1b29;
            --bs-text-gray-200: #2B2B40;
            --bs-text-gray-300: #323248;
            --bs-text-gray-400: #474761;
            --bs-text-gray-500: #565674;
            --bs-text-gray-600: #6D6D80;
            --bs-text-gray-700: #92929F;
            --bs-text-gray-800: #CDCDDE;
            --bs-text-gray-900: #FFFFFF;
            --bs-border-color: #2B2B40;
            --bs-border-dashed-color: #323248;
            --bs-component-active-color: #FFFFFF;
            --bs-component-active-bg: #00A3FF;
            --bs-component-hover-color: #00A3FF;
            --bs-component-hover-bg: #2B2B40;
            --bs-component-checked-color: #FFFFFF;
            --bs-component-checked-bg: #00A3FF;
            --bs-box-shadow-xs: 0 0.1rem 0.75rem 0.25rem rgba(0, 0, 0, 0.05);
            --bs-box-shadow-sm: 0 0.1rem 1rem 0.25rem rgba(0, 0, 0, 0.05);
            --bs-box-shadow: 0 0.5rem 1.5rem 0.5rem rgba(0, 0, 0, 0.075);
            --bs-box-shadow-lg: 0 1rem 2rem 1rem rgba(0, 0, 0, 0.1);
            --bs-input-color: var(--bs-gray-700);
            --bs-input-bg: var(--bs-body-bg);
            --bs-input-solid-color: var(--bs-gray-700);
            --bs-input-solid-bg: var(--bs-gray-100);
            --bs-input-solid-bg-focus: var(--bs-gray-200);
            --bs-input-solid-placeholder-color: var(--bs-gray-500);
            --bs-tooltip-box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.15);
            --bs-card-box-shadow: none;
            --bs-table-striped-bg: rgba(27, 27, 41, 0.75);
            --bs-table-loading-message-box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.3);
            --bs-dropdown-bg: #1e1e2d;
            --bs-dropdown-box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.3);
            --bs-code-bg: #2B2B40;
            --bs-code-box-shadow: 0px 3px 9px rgba(0, 0, 0, 0.08);
            --bs-code-color: #b93993;
            --bs-symbol-label-color: #CDCDDE;
            --bs-symbol-label-bg: #1b1b29;
            --bs-symbol-border-color: rgba(255, 255, 255, 0.5);
            --bs-bullet-bg-color: #474761;
            --bs-scrolltop-opacity: 0;
            --bs-scrolltop-opacity-on: 0.3;
            --bs-scrolltop-opacity-hover: 1;
            --bs-scrolltop-box-shadow: 0 0.5rem 1.5rem 0.5rem rgba(0, 0, 0, 0.075);
            --bs-scrolltop-bg-color: #00A3FF;
            --bs-scrolltop-bg-color-hover: #00A3FF;
            --bs-scrolltop-icon-color: #FFFFFF;
            --bs-scrolltop-icon-color-hover: #FFFFFF;
            --bs-drawer-box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            --bs-drawer-bg-color: #1e1e2d;
            --bs-drawer-overlay-bg-color: rgba(0, 0, 0, 0.4);
            --bs-menu-dropdown-box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.3);
            --bs-menu-dropdown-bg-color: #1e1e2d;
            --bs-menu-heading-color: #565674;
            --bs-menu-link-color-hover: #00A3FF;
            --bs-menu-link-color-show: #00A3FF;
            --bs-menu-link-color-here: #00A3FF;
            --bs-menu-link-color-active: #00A3FF;
            --bs-menu-link-bg-color-hover: #2B2B40;
            --bs-menu-link-bg-color-show: #2B2B40;
            --bs-menu-link-bg-color-here: #2B2B40;
            --bs-menu-link-bg-color-active: #2B2B40;
            --bs-scrollbar-color: #2B2B40;
            --bs-scrollbar-hover-color: #27273a;
            --bs-overlay-bg: rgba(255, 255, 255, 0.05);
            --bs-blockui-overlay-bg: rgba(255, 255, 255, 0.05);
            --bs-rating-color-default: #474761;
            --bs-rating-color-active: #FFAD0F;
            --bs-ribbon-label-box-shadow: 0px -1px 5px 0px rgba(255, 255, 255, 0.1);
            --bs-ribbon-label-bg: #00A3FF;
            --bs-ribbon-label-border-color: #006299;
            --bs-ribbon-clip-bg: #F9F9F9;
            --bs-engage-btn-bg: #2B2B40;
            --bs-engage-btn-box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.3);
            --bs-engage-btn-border-color: #2B2B40;
            --bs-engage-btn-color: #CDCDDE;
            --bs-engage-btn-icon-color: #6D6D80;
            --bs-engage-btn-color-active: #CDCDDE;
        }

        .table {
            --bs-table-color: var(--bs-body-color);
            --bs-table-bg: transparent;
            --bs-table-border-color: var(--bs-border-color);
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: var(--bs-body-color);
            --bs-table-striped-bg: rgba(var(--bs-gray-100-rgb), 0.75);
            --bs-table-active-color: var(--bs-body-color);
            --bs-table-active-bg: var(--bs-gray-100);
            --bs-table-hover-color: var(--bs-body-color);
            --bs-table-hover-bg: var(--bs-gray-100);
            width: 100%;
            margin-bottom: 1rem;
            color: var(--bs-table-color);
            vertical-align: top;
            border-color: var(--bs-table-border-color);
        }

        .table> :not(caption)>*>* {
            padding: 0.75rem 0.75rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        .table>tbody {
            vertical-align: inherit;
        }

        .table>thead {
            vertical-align: bottom;
        }

        .table-group-divider {
            border-top: 2px solid currentcolor;
        }

        .caption-top {
            caption-side: top;
        }

        .table-sm> :not(caption)>*>* {
            padding: 0.5rem 0.5rem;
        }

        .table-bordered> :not(caption)>* {
            border-width: 1px 0;
        }

        .table-bordered> :not(caption)>*>* {
            border-width: 0 1px;
        }

        .table-dark {
            --bs-table-color: #ffffff;
            --bs-table-bg: #181C32;
            --bs-table-border-color: #2f3347;
            --bs-table-striped-bg: #24273c;
            --bs-table-striped-color: #ffffff;
            --bs-table-active-bg: #2f3347;
            --bs-table-active-color: #ffffff;
            --bs-table-hover-bg: #292d41;
            --bs-table-hover-color: #ffffff;
            color: var(--bs-table-color);
            border-color: var(--bs-table-border-color);
        }

        .text-center {
            text-align: center !important;
        }
    </style>
    <title>Permintaan</title>
</head>

<body>
    <table class="table table-dark table-bordered" style="border: solid 1px black; border-collapse: collapse;">
        <thead style="border: solid 1px black">
            <tr style="border: solid 1px black">
                <th rowspan="2" class="text-center" style="vertical-align: middle; border: solid 1px black">Kode</th>
                <th rowspan="2" class="text-center" style="vertical-align: middle; border: solid 1px black">Pemohon
                </th>
                <th rowspan="2" class="text-center" style="vertical-align: middle; border: solid 1px black">Jenis
                    Barang</th>
                <th rowspan="2" class="text-center" style="vertical-align: middle; border: solid 1px black">Harga
                </th>
                <th colspan="2" class="text-center" style="border: solid 1px black">Rincian</th>
                <th rowspan="2" class="text-center" style="vertical-align: middle; border: solid 1px black">Jumlah
                </th>
                <th rowspan="2" class="text-center" style="vertical-align: middle; border: solid 1px black">
                    Keterangan</th>
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
                        <td style="border: solid 1px black; padding: 4px;">
                            {{ $permintaan->kode }}
                        </td>
                        <td style="border: solid 1px black; padding: 4px;">
                            {{ $permintaan->pemohon?->nama }}
                        </td>
                        <td style="border: solid 1px black; padding: 4px;">
                            {{ $barang->nama }}
                        </td>
                        <td style="border: solid 1px black; padding: 4px;">
                            {{ number_format($barang->harga, 0, ',', '.') }}
                        </td>
                        <td style="border: solid 1px black; padding: 4px;">
                            {{ $barang->pivot->volume }}
                        </td>
                        <td style="border: solid 1px black; padding: 4px;">
                            {{ $barang->satuan?->nama }}
                        </td>
                        <td style="border: solid 1px black; padding: 4px;">
                            {{ number_format($barang->pivot->volume * $barang->harga, 0, ',', '.') }}
                        </td>
                        <td style="border: solid 1px black; padding: 4px;">
                            {{ $barang->pivot->keterangan }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="border: solid 1px black; padding: 4px;" class="text-center">Total</td>
                <td style="border: solid 1px black; padding: 4px;">{{ number_format($totalJumlah, 0, ',', '.') }}</td>
                <td style="border: solid 1px black; padding: 4px;"></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
