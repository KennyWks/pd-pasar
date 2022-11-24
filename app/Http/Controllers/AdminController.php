<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Admin PD-Pasar | SODAMOLEK',
            'active' => 'dashboard',
        ]);
    }

    public function pasar()
    {
        return view('admin.pasar.index', [
            'title' => 'Data Pasar | SODAMOLEK',
            'active' => 'pasar',
            'rows' => Pasar::get(),
        ]);
    }

    public function pasarTambah()
    {
        return view('admin.pasar.tambah', [
            'title' => 'Tambah Data Pasar | SODAMOLEK',
            'active' => 'pasar',
        ]);
    }

    public function pasarStore(Request $request)
    {
        $data = [
            'nama_pasar' => $request->input('nama_pasar'),
            'alamat_pasar' => $request->input('alamat_pasar'),
            'telp' => $request->input('telp'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        Pasar::create($data);

        return redirect('/admn-pg/pasar')->with('success', 'Input data berhasil');
    }

    public function pasarEdit($id)
    {
        return view('admin.pasar.edit', [
            'title' => 'Edit Data Pasar | SODAMOLEK',
            'active' => 'pasar',
            'r' => Pasar::find($id),
        ]);
    }

    public function pasarUpdate(Request $request, $id)
    {
        $data = [
            'nama_pasar' => $request->input('nama_pasar'),
            'alamat_pasar' => $request->input('alamat_pasar'),
            'telp' => $request->input('telp'),
            'email' => $request->input('email'),
        ];

        if ($request->input('password') != null) {
            $data['password'] = Hash::make($request->input('password'));
        }

        Pasar::find($id)->update($data);

        return redirect('/admn-pg/pasar')->with('success', 'Input data diupdate');
    }

    public function pasarHapus($id)
    {
        Pasar::destroy($id);
        return redirect('/admn-pg/pasar')->with('success', 'Input data dihapus');
    }
}
