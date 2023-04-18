<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
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
        $data = Permintaan::query()->get();
        return DataTables::of($data)
            ->editColumn('action', function (Permintaan $permintaan) {
                return view('permintaan.action', compact('permintaan'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
