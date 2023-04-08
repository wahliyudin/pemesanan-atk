<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PemasokController extends Controller
{
    public function index()
    {
        return view('pemasok.index');
    }

    public function list()
    {
        $data = Pemasok::query()->get();
        return DataTables::of($data)
            ->editColumn('action', function (Pemasok $pemasok) {
                return view('pemasok.action', compact('pemasok'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Pemasok::query()->create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'telpon' => $request->telpon,
                'email' => $request->email,
            ]);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Pemasok $pemasok)
    {
        try {
            $pemasok->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}