<?php

namespace App\Http\Controllers\Admin\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Program_studiController extends Controller
{
    public function index()
    {
        $data['title'] = 'Program Studi';
        $data['data'] = ProgramStudi::all();
        $data['jenjang'] = Jenjang::all();
        return view('admin/jurusan/program_studi', $data);
    }
    public function store(Request $request){
        $obj = array(
            'kode_program_studi' => $request->kode_prodi,
            'nama_program_studi' => $request->nama_prodi,
            'singkatan_program_studi' => $request->singkatan_prodi,
            'id_jenjang' => $request->jenjang,
            'kompetensi' => $request->kompetensi,
            'kaprodi' => $request->kaprodi,
        );
        
        try {
            ProgramStudi::create($obj);
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Tambah Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function delete($id){
        try {
            ProgramStudi::where('id',$id)->delete();
            Alert::success('Delete Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Delete Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function jenjang()
    {
        $data['title'] = 'Jenjang';
        $data['data'] = Jenjang::all();
        return view('admin/jurusan/program_studi/jenjang', $data);
    }
    public function jenjang_store(Request $request){
        $obj = array(
            'nama_jenjang' => $request->nama_jenjang
        );
        try {
            Jenjang::Create($obj);
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Tambah Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function jenjang_update(Request $request){
        $obj = array(
            'nama_jenjang' => $request->nama_jenjang
        );
        try {
            Jenjang::where('id',$request->id)->update($obj);
            Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Update Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function jenjang_delete($id){
        try {
            Jenjang::where('id',$id)->delete();
            Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Update Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
}
