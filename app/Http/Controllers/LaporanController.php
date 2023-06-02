<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Permintaan;
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
        return SnappyPdf::loadView('document.permintaan', compact('permintaans'))->download();
    }

    public function pemesanan(Request $request)
    {
        $pemesanans = Pemesanan::query()
            ->whereBetween('tanggal', [$request->start_date, $request->end_date])
            ->get();
        return SnappyPdf::loadView('document.pemesanan', compact('pemesanans'))->download();
    }
}
