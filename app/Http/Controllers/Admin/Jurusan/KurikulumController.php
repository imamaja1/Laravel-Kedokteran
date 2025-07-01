<?php

namespace App\Http\Controllers\Admin\Jurusan;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index(){
        $data['title'] = 'Data Kurikulum';
        $data['data'] = Kurikulum::all();
        return view('admin/jurusan/kurikulum', $data);
    }
}
