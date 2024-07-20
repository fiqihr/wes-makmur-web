<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('role', '!=', 'admin')->get();
        return view('user/tampil', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        // disini saya coba menggunakan find id tetapi data tidak berubah saat di update, oleh karena itu saya menggunakan db table
        DB::table('users')->where('id', $id)->update([
            'role' => $request->role,
        ]);

        return redirect('user')->with('success', 'Hak akses berhasil diubah');
    }

}