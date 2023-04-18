<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.index');
    }

    public function list()
    {
        $data = Pegawai::query()->get();
        return DataTables::of($data)
            ->editColumn('jenis_kelamin', function (Pegawai $pegawai) {
                return $pegawai->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki - Laki';
            })
            ->editColumn('tanggal_lahir', function (Pegawai $pegawai) {
                return Carbon::make($pegawai->tanggal_lahir)->translatedFormat('d F Y');
            })
            ->editColumn('action', function (Pegawai $pegawai) {
                return view('pegawai.action', compact('pegawai'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Pegawai::query()->create([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Pegawai $pegawai)
    {
        try {
            return response()->json([
                'kode' => $pegawai->getKey(),
                'nip' => $pegawai->nip,
                'nama' => $pegawai->nama,
                'jenis_kelamin' => $pegawai->jenis_kelamin,
                'tempat_lahir' => $pegawai->tempat_lahir,
                'tanggal_lahir' => $pegawai->tanggal_lahir,
                'no_hp' => $pegawai->no_hp,
                'alamat' => $pegawai->alamat,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        try {
            $pegawai->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
            return response()->json([
                'message' => 'Successfully Updated'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Pegawai $pegawai)
    {
        try {
            $pegawai->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
