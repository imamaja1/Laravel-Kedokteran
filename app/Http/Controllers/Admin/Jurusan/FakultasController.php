<?php

namespace App\Http\Controllers\Admin\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FakultasController extends Controller
{
    public function index(){
        $data['title'] = 'Fakultas';
        $data['data'] = Fakultas::get()->first();
        return view('admin/jurusan/fakultas',$data);
    } 
    public function update(Request $request, $id){
        Fakultas::where('id',$id)->update(array(
            'kode_fakultas' => $request->kode_fakultas,
            'nama_fakultas' => $request->nama_fakultas,
            'dekan' => $request->dekan,
        ));
        return redirect()->back();
    } 
}
