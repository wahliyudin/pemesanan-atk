<?php

namespace App\Http\Controllers;

use App\Enums\Pemesanan\Status;
use App\Enums\Role;
use App\Models\Barang;
use App\Models\Pemesanan;
use App\Traits\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PemesananController extends Controller
{
    use Helper;

    public function index()
    {
        return view('pemesanan.index');
    }

    public function list()
    {
        $data = Pemesanan::query()->with(['barangs'])->get();
        return DataTables::of($data)
            ->editColumn('pemohon', function (Pemesanan $pemesanan) {
                return $pemesanan?->pemohon?->nama;
            })
            ->editColumn('tanggal', function (Pemesanan $pemesanan) {
                return Carbon::make($pemesanan?->tanggal)->translatedFormat('d F Y');
            })
            ->editColumn('status', function (Pemesanan $pemesanan) {
                return $pemesanan->status?->badge();
            })
            ->editColumn('action', function (Pemesanan $pemesanan) {
                return view('pemesanan.action', compact('pemesanan'))->render();
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function create()
    {
        $barangs = Barang::query()->get(['kode', 'nama']);
        return view('pemesanan.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        try {
            $pemesanan = Pemesanan::query()->create([
                'tanggal' => $request->tanggal,
            ]);
            $pemesanan->barangs()->attach($request->kt_products);
            return to_route('pemesanan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit(Pemesanan $pemesanan)
    {
        $barangs = Barang::query()->get(['kode', 'nama']);
        return view('pemesanan.edit', compact('barangs', 'pemesanan'));
    }

    public function update(Pemesanan $pemesanan, Request $request)
    {
        try {
            $pemesanan->update([
                'tanggal' => $request->tanggal,
            ]);
            $pemesanan->barangs()->sync($request->kt_products);
            return to_route('pemesanan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroy(Pemesanan $pemesanan)
    {
        try {
            $pemesanan->barangs()->sync([]);
            $pemesanan->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function setujui(Pemesanan $pemesanan)
    {
        try {
            $pemesanan->update([
                'status' => Status::SETUJUI
            ]);
            return response()->json([
                'message' => 'Berhasil disetujui'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function tolak(Pemesanan $pemesanan)
    {
        try {
            $pemesanan->update([
                'status' => Status::TOLAK
            ]);
            return response()->json([
                'message' => 'Berhasil ditolak'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
