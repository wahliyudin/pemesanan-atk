<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Permintaan;
use App\Models\Stok;
use App\Traits\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PermintaanController extends Controller
{
    use Helper;

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
        return view('permintaan.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        try {
            $permintaan = Permintaan::query()->create([
                'kode_pegawai' => $this->bendahara()?->kode,
                'tanggal' => $request->tanggal,
                'kode_pemohon' => auth()->user()?->pegawai?->kode,
            ]);
            $permintaan->barangs()->attach($request->kt_products);
            foreach ($request->kt_products as $value) {
                $stok = Stok::query()->where('kode_barang', $value['kode_barang'])->first();
                $stok?->update([
                    'kuantitas' => ($stok->kuantitas - (isset($value['volume']) ? $value['volume'] : 0)),
                ]);
            }
            return to_route('permintaan');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit(Permintaan $permintaan)
    {
        $barangs = Barang::query()->get(['kode', 'nama']);
        return view('permintaan.edit', compact('barangs', 'permintaan'));
    }

    public function update(Permintaan $permintaan, Request $request)
    {
        try {
            $permintaan->update([
                'tanggal' => $request->tanggal,
            ]);
            foreach ($permintaan->barangs as $barang) {
                $stok = Stok::query()->where('kode_barang', $barang->kode)->first();
                $stok?->update([
                    'kuantitas' => ($stok->kuantitas + $barang->pivot?->volume),
                ]);
            }
            $permintaan->barangs()->sync($request->kt_products);
            foreach ($request->kt_products as $value) {
                $stok = Stok::query()->where('kode_barang', $value['kode_barang'])->first();
                $stok?->update([
                    'kuantitas' => ($stok->kuantitas - (isset($value['volume']) ? $value['volume'] : 0)),
                ]);
            }
            return to_route('permintaan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function show(Permintaan $permintaan)
    {
        return view('permintaan.show', compact('permintaan'));
    }

    public function destroy(Permintaan $permintaan)
    {
        try {
            foreach ($permintaan->barangs as $barang) {
                $stok = Stok::query()->where('kode_barang', $barang->kode)->first();
                $stok?->update([
                    'kuantitas' => ($stok->kuantitas + $barang->pivot?->volume),
                ]);
            }
            $permintaan->barangs()->sync([]);
            $permintaan->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
