<?php

namespace App\Http\Controllers\Api;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all('nim','nama_mahasiswa');
        echo json_encode($data);
    }
    public function prodi($prodi)
    {
        $data = Mahasiswa::select('nim','nama_mahasiswa')->where('program_studi_kode',$prodi)->get();
        echo json_encode($data);
    }
}
