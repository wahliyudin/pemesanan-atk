<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SatuanController extends Controller
{
    public function index()
    {
        return view('satuan.index');
    }

    public function list()
    {
        $data = Satuan::query()->get();
        return DataTables::of($data)
            ->editColumn('action', function (Satuan $satuan) {
                return view('satuan.action', compact('satuan'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Satuan::query()->create([
                'nama' => $request->nama,
            ]);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Satuan $satuan)
    {
        try {
            $satuan->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
