<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Permintaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PermintaanController extends Controller
{
    public function index()
    {
        return view('permintaan.index');
    }

    public function list()
    {
        $data = Permintaan::query()->with(['barangs', 'pemohon', 'pegawai'])->get();
        return DataTables::of($data)
            ->editColumn('pemohon', function (Permintaan $permintaan) {
                return $permintaan?->pemohon?->nama;
            })
            ->editColumn('tanggal', function (Permintaan $permintaan) {
                return Carbon::make($permintaan?->tanggal)->translatedFormat('d F Y');
            })
            ->editColumn('action', function (Permintaan $permintaan) {
                return view('permintaan.action', compact('permintaan'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $barangs = Barang::query()->get(['kode', 'nama']);
        $pegawais = Pegawai::query()->get(['kode', 'nama']);
        return view('permintaan.create', compact('pegawais', 'barangs'));
    }

    public function store(Request $request)
    {
        try {
            $permintaan = Permintaan::query()->create([
                'kode_pegawai' => $request->kode_pegawai,
                'tanggal' => $request->tanggal,
                'kode_pemohon' => $request->kode_pemohon,
            ]);
            $permintaan->barangs()->attach($request->kt_products);
            return to_route('permintaan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Permintaan $permintaan)
    {
        $barangs = Barang::query()->get(['kode', 'nama']);
        $pegawais = Pegawai::query()->get(['kode', 'nama']);
        return view('permintaan.edit', compact('pegawais', 'barangs', 'permintaan'));
    }

    public function update(Permintaan $permintaan, Request $request)
    {
        try {
            $permintaan->update([
                'kode_pegawai' => $request->kode_pegawai,
                'tanggal' => $request->tanggal,
                'kode_pemohon' => $request->kode_pemohon,
            ]);
            $permintaan->barangs()->sync($request->kt_products);
            return to_route('permintaan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
