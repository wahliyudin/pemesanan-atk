<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BidangController extends Controller
{
    public function index()
    {
        return view('bidang.index');
    }

    public function list()
    {
        $data = Bidang::query()->get();
        return DataTables::of($data)
            ->editColumn('action', function (Bidang $bidang) {
                return view('bidang.action', compact('bidang'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Bidang::query()->create([
                'nama' => $request->nama,
            ]);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Bidang $bidang)
    {
        try {
            return response()->json([
                'kode' => $bidang->getKey(),
                'nama' => $bidang->nama,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, Bidang $bidang)
    {
        try {
            $bidang->update([
                'nama' => $request->nama,
            ]);
            return response()->json([
                'message' => 'Successfully Updated'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Bidang $bidang)
    {
        try {
            $bidang->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
