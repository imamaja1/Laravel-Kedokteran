<?php

namespace App\Http\Controllers\Admin\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    public function index()
    {
        $data['title'] = "Dosen";
        $data['data'] = Dosen::all();
        return view('admin.jurusan.dosen', $data);
    }
    public function store(Request $request)
    {
        $obj = array(
            'nik' => $request->nik,
            'nama_dosen' => $request->nama_dosen,
            'field_studi' => $request->field_studi,
            'alumni' => $request->alumni,
            'no_telp' => $request->no_telp,
            'homebase' => $request->homebase,
            'email' => $request->email,
            'sandi_pengguna' => $request->sandi_pengguna,
            'status_dosen' => $request->status_dosen,
            'status' => $request->status,
        );
        try {
            Dosen::create($obj);
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);

        } catch (\Throwable $th) {
            Alert::error('Tambah Data Gagal', 'Server Error!')->autoClose(6000);
        }
        return redirect()->back();
    }
    public function show($id, $aktif = 1)
    {
        $data['title'] = "Update Dosen";
        $data['active'] = $aktif;
        $data['data'] = Dosen::where('id', $id)->get();
        return view('admin.jurusan.dosen.update', $data);
    }
    public function update(Request $request, $id)
    {
        $obj = array(
            'nik' => $request->nik,
            'nama_dosen' => $request->nama_dosen,
            'field_studi' => $request->field_studi,
            'alumni' => $request->alumni,
            'no_telp' => $request->no_telp,
            'homebase' => $request->homebase,
            'email' => $request->email,
            'sandi_pengguna' => $request->sandi_pengguna,
            'status_dosen' => $request->status_dosen,
            'status' => $request->status,
        );
        try {
            Dosen::create($obj);
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);

        } catch (\Throwable $th) {
            Alert::error('Tambah Data Gagal', 'Server Error!')->autoClose(2000);
        }
        return redirect()->route('produk.show', ['id' => $id, 'aktif' => 1]);

    }
    public function update_foto(Request $request, $id)
    {
        return redirect()->route('produk.show', ['id' => $id, 'aktif' => 2]);
    }
    public function update_signature(Request $request, $id)
    {
        return redirect()->route('produk.show', ['id' => $id, 'aktif' => 3]);
    }
    public function delete()
    {

    }
}
