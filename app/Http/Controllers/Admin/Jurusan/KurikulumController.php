<?php

namespace App\Http\Controllers\Admin\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\DataKurikulum;
use App\Models\Kurikulum;
use App\Models\Matakuliah;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KurikulumController extends Controller
{
    public function index(){
        $data['title'] = 'Data Kurikulum';
        $data['kurikulum'] = Kurikulum::all();
        for ($i=1; $i <= 8 ; $i++) { 
            $obj[] = array(
                'semester' => $i,
                'data' => DataKurikulum::with('data_matakuliah')->where('semester',$i)->get()
            );
        }
        $data['id_kurikulum'] = Kurikulum::get()->first();
        $data['data'] = $obj;
        $data['matakuliah'] = Matakuliah::all();
        return view('admin/jurusan/kurikulum', $data);
    }
    public function store(Request $request){
        $obj = array(
            'semester' => $request->semester,
            'id_kurikulum' => $request->kurikulum,
            'id_matakuliah' => $request->matakuliah
        );
        try {
            DataKurikulum::create($obj);
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Tambah Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function delete($id){
        try {
            DataKurikulum::where('id',$id)->delete();
            Alert::success('Delete Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Delete Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function kurkulum_kedokteran(){
        $data['title'] = 'Data Kurikulum Kedokteran';
        $data['kurikulum'] = Kurikulum::with('tahun_akademik')->get();
        $data['tahun_akademik'] = TahunAkademik::where('semester',1)->get();
        return view('admin/jurusan/kurikulum/data_kurikulum', $data);
    }
    public function kurkulum_kedokteran_store(Request $request){
        $obj = array(
            'nama_kurikulum' => $request->nama_kurikulum,
            'id_tahun_akademik' => $request->tahun_akademik,
        );
        try {
            Kurikulum::create($obj);
            Alert::success('Tambah Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Tambah Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function kurkulum_kedokteran_update(Request $request){
        $obj = array(
            'nama_kurikulum' => $request->nama_kurikulum,
            'id_tahun_akademik' => $request->tahun_akademik,
        );
        try {
            Kurikulum::where('id',$request->id)->update($obj);
            Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Update Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
    public function kurkulum_kedokteran_delete($id){
        try {
            Kurikulum::where('id',$id)->delete();
            Alert::success('Delete Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
        } catch (\Throwable $th) {
            Alert::error('Delete Data Error', 'Server Error!')->autoClose(2000);
        }
        return redirect()->back();
    }
}
