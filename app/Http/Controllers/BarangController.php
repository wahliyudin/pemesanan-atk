<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use App\Services\Barang\BarangService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function __construct(
        protected BarangService $barangService
    ) {
    }

    public function index()
    {
        $satuan = Satuan::query()->get(['kode', 'nama']);
        return view('barang.index', compact('satuan'));
    }

    public function list()
    {
        $data = $this->barangService->getAllWithSatuan();
        return DataTables::of($data)
            ->editColumn('harga', function (Barang $barang) {
                return "Rp. " . number_format($barang->harga, 0, ',', '.');
            })
            ->editColumn('satuan', function (Barang $barang) {
                return $barang->satuan?->nama ?? '-';
            })
            ->editColumn('action', function (Barang $barang) {
                return view('barang.action', compact('barang'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            $this->barangService->create([
                'nama' => $request->nama,
                'harga' => (int) str($request->harga)->replace('.', '')->value(),
                'satuan_kode' => $request->satuan_kode,
            ]);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Barang $barang)
    {
        try {
            return response()->json([
                'kode' => $barang->getKey(),
                'nama' => $barang->nama,
                'harga' => number_format($barang->harga, 0, ',', '.'),
                'satuan_kode' => $barang->satuan_kode,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->barangService->update($id, [
                'nama' => $request->nama,
                'harga' => (int) str($request->harga)->replace('.', '')->value(),
                'satuan_kode' => $request->satuan_kode,
            ]);
            return response()->json([
                'message' => 'Successfully Updated'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $this->barangService->delete($id);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
