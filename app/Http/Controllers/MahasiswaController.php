<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mhs;
use App\Models\Kurikulum;
use App\Models\Setup_grade;
use Illuminate\Http\Request;
use App\Models\Nama_kurikulum;
use App\Models\Kurikulum_angkatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\json_encode;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['nav'] = 'dashboard';
        return view('mahasiswa.dashboard',$data);
    }
    public function profil()
    {
        $data['title'] = "Profil Mahasiswa";
        $data['nav'] = 'profil';
        return view('mahasiswa.profil',$data);
    }
    public function kurikulum()
    {
        $data['title'] = "Kurikulum";
        $data['nav'] = 'kurikulum';
        $prodi = Mhs::where('nim',Auth::user()->nim)
            ->get('program_studi_kode')->first()->program_studi_kode;
        $data['data'] = Nama_kurikulum::with('kurikulum_angkatan','kurikulum')->where('kode_program_studi',$prodi)->get();
        return view('mahasiswa.kurikulum',$data);
    }
    public function krs()
    {
        $data['title'] = "KRS";
        $data['nav'] = 'krs';
        $data['data'] = Krs::with('matakuliah')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'krs.nim')
                        ->where('krs.nim',Auth::user()->nim)->get();
        return view('mahasiswa.krs',$data);
    }
    public function khs()
    {
        $data['title'] = "KRS";
        $data['nav'] = 'khs';
        $data['data'] = krs::with('khs')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'krs.nim')
                        ->where('krs.nim',Auth::user()->nim)
                        ->get();
        $data['setup'] = Setup_grade::where('tahun_akademik',1)->get();
        return view('mahasiswa.khs',$data);
    }
    public function petikan_nilai()
    {
        $data['title'] = "Petikan Nilai";
        $data['nav'] = 'petikan_nilai';
        $prodi = Mhs::where('nim',Auth::user()->nim)
                    ->get('program_studi_kode')->first()->program_studi_kode;
        $data['data'] = Nama_kurikulum::with('kurikulum_khs')
                            ->join('kurikulum_angkatan','kurikulum_angkatan.kode_nama_kurikulum','=','nama_kurikulum.kode_nama_kurikulum')
                            ->where('kode_program_studi',$prodi)
                            ->where('angkatan' , '<=' ,'20'.substr(Auth::user()->nim,0,2))
                            ->orderBy('angkatan','desc')
                            ->get()->first();

        $setup = Setup_grade::where('tahun_akademik',1)->get();
        foreach ($data['data']->kurikulum_khs as $key => $value) {
            $tmp = Krs::join('krs_detail','krs_detail.kode_krs','=','krs.kode_krs')
                        ->join('khs_detail','khs_detail.kode_krs_detail','=','krs_detail.kode_krs_detail')
                        ->where('nim',Auth::user()->nim)
                        ->where('krs_detail.id_matakuliah',$value->id_matakuliah)
                        ->orderBy('khs_detail.nilai_akhir')
                        ->limit(1)->get();
            foreach ($tmp as $no => $val1) {
                foreach ($setup as $val2) {
                    if($val2->nilai_minimum <= $val1->nilai_akhir && $val2->nilai_maksimum >= $val1->nilai_akhir){
                        $tmp[$no]->grade = $val2->grade;
                    }
                }
            }
            $data['data']->kurikulum_khs[$key]->nilai = $tmp;
        }
        return view('mahasiswa.petikan_nilai',$data);
    }
    public function Kuisoner()
    {
        $data['title'] = "Dashboard";
        return view('mahasiswa.dashboard',$data);
    }
}
