<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Stok;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index()
    {
        $barang = Barang::query()->get(['kode', 'nama']);
        return view('stok.index', compact('barang'));
    }

    public function list()
    {
        $data = Stok::query()->with('barang')->get();
        return DataTables::of($data)
            ->editColumn('nama', function (Stok $stok) {
                return $stok->barang?->nama;
            })
            ->editColumn('action', function (Stok $stok) {
                return view('stok.action', compact('stok'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Stok::query()->create([
                'kode_barang' => $request->barang,
                'kuantitas' => $request->kuantitas,
            ]);
            return response()->json([
                'message' => 'Successfully Created'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Stok $stok)
    {
        try {
            return response()->json([
                'kode' => $stok->getKey(),
                'kode_barang' => $stok->kode_barang,
                'kuantitas' => $stok->kuantitas,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, Stok $stok)
    {
        try {
            $stok->update([
                'kode_barang' => $request->barang,
                'kuantitas' => $request->kuantitas,
            ]);
            return response()->json([
                'message' => 'Successfully Updated'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Stok $stok)
    {
        try {
            $stok->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
