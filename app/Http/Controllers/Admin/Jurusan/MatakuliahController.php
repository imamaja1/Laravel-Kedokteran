<?php

namespace App\Http\Controllers\Admin\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MatakuliahController extends Controller
{
    public function index()
    {
        $data['title'] = 'Matakuliah';
        $data['data'] = Matakuliah::all();
        return view('admin/jurusan/matakuliah', $data);
    }
    public function store(Request $request)
    {
        $obj = array(
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks_teori' => $request->sks_teori,
            'sks_praktik' => $request->sks_praktik,
            'sks_praktikum' => $request->sks_praktikum
        );
        try {
            Matakuliah::create($obj);
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);

        } catch (\Throwable $th) {
            Alert::error('Tambah Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $obj = array(
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks_teori' => $request->sks_teori,
            'sks_praktik' => $request->sks_praktik,
            'sks_praktikum' => $request->sks_praktikum
        );
        try {
            Matakuliah::where('id', $request->id)->update($obj);
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);

        } catch (\Throwable $th) {
            Alert::error('Tambah Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        try {
            Matakuliah::where('id', $id)->delete();
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);

        } catch (\Throwable $th) {
            Alert::error('Tambah Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
}
