<?php

namespace App\Http\Controllers\Admin\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $data['title'] = "Dosen";
        $data['data'] = Dosen::all();
        return view('admin.jurusan.dosen',$data);
    }
    public function create()
    {

    }
    public function store()
    {

    }
    public function ubah()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
