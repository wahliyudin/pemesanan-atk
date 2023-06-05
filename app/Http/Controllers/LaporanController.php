<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Permintaan;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function permintaan(Request $request)
    {
        $permintaans = Permintaan::query()
            ->whereBetween('tanggal', [$request->start_date, $request->end_date])
            ->get();
        return Pdf::loadView('document.permintaan', compact('permintaans'))->stream();
        // return SnappyPdf::loadView('document.permintaan', compact('permintaans'))->inline();
    }

    public function pemesanan(Request $request)
    {
        $pemesanans = Pemesanan::query()
            ->whereBetween('tanggal', [$request->start_date, $request->end_date])
            ->get();
        return Pdf::loadView('document.pemesanan', compact('pemesanans'))->stream();
        // return SnappyPdf::loadView('document.pemesanan', compact('pemesanans'))->download();
    }
}
