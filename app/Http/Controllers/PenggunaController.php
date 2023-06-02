<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index');
    }

    public function list()
    {
        $data = User::query()->get();
        return DataTables::of($data)
            ->editColumn('action', function (User $user) {
                return view('pengguna.action', compact('user'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'unique:users,email'
            ]);
            User::query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(User $user)
    {
        try {
            return response()->json([
                'kode' => $user->getKey(),
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'role' => $user->role,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'email' => "unique:users,email,$user->id,id"
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ]);
            return response()->json([
                'message' => 'Successfully Updated'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
