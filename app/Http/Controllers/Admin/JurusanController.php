<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\Kaprodi;
use App\Models\Fakultas;
use App\Models\Institusi;
use App\Models\Kurikulum;
use App\Models\Mahasiswa;
use App\Models\Kompetensi;
use App\Models\Matakuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Models\Nama_kurikulum;
use App\Models\Kurikulum_angkatan;
use App\Models\MatakuliahPrasyarat;
use App\Http\Controllers\Controller;
use App\Models\MatakulliahKompetensi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Jurusan\StoreJurusan;
use App\Http\Requests\Jurusan\RequesJenjang;
use App\Http\Requests\Jurusan\RequesJurusan;
use App\Http\Requests\Jurusan\RequesFakultas;
use App\Http\Requests\Jurusan\RequesKompetensi;
use App\Http\Requests\Jurusan\RequesProgramStudi;


class JurusanController extends Controller
{
    public function institusi()
    {
        $data['nav'] = 'jurusan';
        $data['title'] = 'Institusi';
        $data['data'] = Institusi::get()->first();
        return view('admin.jurusan.institusi', $data);
    }
    public function put_institusi(StoreJurusan $request)
    {
        Institusi::where('kode_institusi', $request->kode_institusi)->update(
            array(
                'nama_institusi' => $request->nama_institusi,
                'singkatan' => $request->singkatan,
            )
        );
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function fakultas()
    {
        $data['nav'] = 'jurusan';
        $data['title'] = 'Fakultas';
        $data['data'] = Fakultas::get();
        $data['dosen'] = Dosen::all();
        return view('admin.jurusan.fakultas', $data);
    }
    public function put_fakultas(RequesFakultas $request)
    {
        Fakultas::where('kode_fakultas', $request->kode_fakultas)->update(
            array(
                'nama_fakultas' => $request->nama_fakultas,
                'dekan' => $request->dekan,
            )
        );
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    // prodi
    public function prodi()
    {
        $data['nav'] = 'program_studi';
        $data['sub_nav'] = 'prodi';
        $data['title'] = 'Program Studi';
        $data['isntitusi'] = Jenjang::all();
        return view('admin.jurusan.prodi', $data);
    }
    public function jenjang()
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'prodi';
        $data['title'] = 'Jenjang';
        $data['data'] = Jenjang::get();
        return view('admin.jurusan.prodi.jenjang', $data);
    }
    public function store_jenjang(RequesJenjang $request)
    {
        
    }
    public function put_jenjang(RequesJenjang $request)
    {
        
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        
    }
    public function delete_jenjang($id)
    {
        Jenjang::where('id_jenjang', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    public function kode_jurusan()
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'prodi';
        $data['title'] = 'Kode Jurusan';
        $data['data'] = Jurusan::with('institusi')->get();
        $data['fakultas'] = Institusi::all();
        return view('admin.jurusan.prodi.kode_jurusan', $data);
    }
    public function store_kode_jurusan(RequesJurusan $request)
    {
        Jurusan::create(
            array(
                'kode_jurusan' => $request->kode_jurusan,
                'nama_jurusan' => $request->nama_jurusan,
                'kode_institusi' => $request->kode_institusi,
            )
        );
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_kode_jurusan(RequesJurusan $request)
    {
        Jurusan::where('id_jurusan', $request->id_jurusan)->update(
            array(
                'kode_jurusan' => $request->kode_jurusan,
                'nama_jurusan' => $request->nama_jurusan,
                'kode_institusi' => $request->kode_institusi,
            )
        );
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_kode_jurusan($id)
    {
        Jurusan::where('id_jurusan', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    public function nama_jurusan()
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'prodi';
        $data['title'] = 'Nama Jurusan';
        $data['data'] = ProgramStudi::get();
        $data['jenjang'] = Jenjang::all();
        $data['fakultas'] = Fakultas::all();
        $data['program_studi'] = ProgramStudi::all();
        return view('admin.jurusan.prodi.nama_jurusan', $data);
    }
    public function store_nama_jurusan(RequesProgramStudi $request)
    {
        ProgramStudi::create(
            array(
                'id_jenjang' => $request->id_jenjang,
                'nama_program_studi' => $request->nama_program_studi,
                'singkatan_program_studi' => $request->singkatan_program_studi,
                'kode_fakultas' => $request->kode_fakultas,
                'kode_prodi_univ' => $request->kode_prodi_univ,
                'kompetensi' => $request->kompetensi,
            )
        );
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_nama_jurusan(RequesProgramStudi $request)
    {
        ProgramStudi::where('kode_program_studi', $request->kode_program_studi)->update(
            array(
                'id_jenjang' => $request->id_jenjang,
                'nama_program_studi' => $request->nama_program_studi,
                'singkatan_program_studi' => $request->singkatan_program_studi,
                'kode_fakultas' => $request->kode_fakultas,
                'kode_prodi_univ' => $request->kode_prodi_univ,
                'kompetensi' => $request->kompetensi,
            )
        );
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_nama_jurusan($id)
    {
        ProgramStudi::where('kode_program_studi', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    public function kompetensi()
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'prodi';
        $data['title'] = 'Kompetensi';
        $data['data'] = Kompetensi::get();
        $data['prodi'] = ProgramStudi::all();
        return view('admin.jurusan.prodi.kompetensi', $data);
    }
    public function store_kompetensi(RequesKompetensi $request)
    {
        Kompetensi::create(
            array(
                'nama_kompetensi' => $request->nama_kompetensi,
                'singkatan_kompetensi' => $request->singkatan_kompetensi,
                'kode_program_studi' => $request->kode_program_studi,
            )
        );
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_kompetensi(RequesKompetensi $request)
    {
        Kompetensi::where('kode_kompetensi', $request->kode_kompetensi)->update(
            array(
                'nama_kompetensi' => $request->nama_kompetensi,
                'singkatan_kompetensi' => $request->singkatan_kompetensi,
                'kode_program_studi' => $request->kode_program_studi,
            )
        );
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_kompetensi($id)
    {
        Kompetensi::where('kode_kompetensi', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    public function matakuliah_kompetensi($id)
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'prodi';
        $data['title'] = 'Matakuliah Kompetensi';
        $data['data_kompetensi'] = kompetensi::with('matakuliah')->where('kode_kompetensi', $id)->get()->first();
        $data['data'] = MatakulliahKompetensi::with('matakuliah')->where('kode_kompetensi', $id)->get();
        return view('admin.jurusan.prodi.matakuliah_kompetensi', $data);
    }
    public function store_matakuliah_kompetensi(Request $request, $id)
    {
        MatakulliahKompetensi::create(
            array(
                'id_matakuliah' => $request->id_matakuliah,
                'kode_kompetensi' => $id,
            )
        );
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_matakuliah_kompetensi($id, $code)
    {
        MatakulliahKompetensi::where('id', $code)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    public function ketua_jurusan()
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'prodi';
        $data['title'] = 'Ketua Jurusan';
        $data['data'] = Kaprodi::all();
        $data['dosen'] = Dosen::all();
        $data['prodi'] = ProgramStudi::all();
        return view('admin.jurusan.prodi.ketua_jurusan', $data);
    }
    public function store_ketua_jurusan(Request $request)
    {
        Kaprodi::create(
            array(
                'kode_program_studi' => $request->kode_program_studi,
                'kode_dosen' => $request->kode_dosen,
            )
        );
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_ketua_jurusan(Request $request)
    {
        Kaprodi::where('kode_kaprodi', $request->kode_kaprodi)->update(
            array(
                'kode_program_studi' => $request->kode_program_studi,
                'kode_dosen' => $request->kode_dosen,
            )
        );
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_ketua_jurusan($id)
    {
        Kaprodi::where('kode_kaprodi', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    // kurikulum
    public function matakuliah($id = null)
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'kurkulum';
        $data['title'] = 'Matakuliah';
        $data['prodi'] = ProgramStudi::all();
        if ($id) {
            $data['data'] = Matakuliah::where('kode_program_studi', $id)->get();
            $prodi = ProgramStudi::where('kode_program_studi', $id)->first();
            $data['select_prodi'] = $prodi;
        } else {
            $prodi = ProgramStudi::all()->first();
            $data['data'] = Matakuliah::where('kode_program_studi', $prodi->kode_program_studi)->get();
            $data['select_prodi'] = $prodi;
        }
        return view('admin.jurusan.kurikulum.metakuliah', $data);
    }
    public function store_matakuliah(Request $request)
    {
        $data = array(
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks_teori' => $request->sks_teori,
            'sks_praktek' => $request->sks_praktek,
            'sks_praktikum' => $request->sks_praktikum,
            'kode_program_studi' => $request->kode_program_studi,
        );
        Matakuliah::create($data);
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_matakuliah(Request $request)
    {
        $data = array(
            'id_matakuliah' => $request->id_matakuliah,
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks_teori' => $request->sks_teori,
            'sks_praktek' => $request->sks_praktek,
            'sks_praktikum' => $request->sks_praktikum,
        );
        Matakuliah::where('id_matakuliah', $request->id_matakuliah)->update($data);
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_matakuliah($id)
    {
        try {
            Matakuliah::where('id_matakuliah', $id)->delete();
            Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::warning('Delete Error', 'Tidak Dapat Dihapus Karna data ini terikat dengan data KRS')->autoClose(10000);
            return redirect()->back();
        }
    }

    public function nama_kurikulum()
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'kurkulum';
        $data['title'] = 'Nama Kurikulum';
        $data['prodi'] = ProgramStudi::all();
        $data['data'] = Nama_kurikulum::with('prodi')->orderBy('kode_nama_kurikulum', 'desc')->get();
        return view('admin.jurusan.kurikulum.nama_kurikulum', $data);
    }
    public function store_nama_kurikulum(Request $request)
    {
        $data = array(
            'nama_kurikulum' => $request->nama_kurikulum,
            'kode_program_studi' => $request->kode_program_studi,
        );
        Nama_kurikulum::create($data);
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_nama_kurikulum(Request $request)
    {
        $data = array(
            'nama_kurikulum' => $request->nama_kurikulum,
            'kode_program_studi' => $request->kode_program_studi,
        );
        Nama_kurikulum::where('kode_nama_kurikulum', $request->kode_nama_kurikulum)->update($data);
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_nama_kurikulum($id)
    {
        try {
            Nama_kurikulum::where('kode_nama_kurikulum', $id)->delete();
            Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::warning('Delete Error', 'Tidak Dapat Dihapus Karna data ini terikat dengan data KRS')->autoClose(10000);
            return redirect()->back();
        }
    }
    public function data_kurikulum($id = null)
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'kurkulum';
        $data['title'] = 'Data Kurkulum';
        if ($id) {
            $data['nama_kurikulum'] = Nama_kurikulum::OrderBy('kode_nama_kurikulum', 'desc')->get();
            $data['select_kurikulun'] = Nama_kurikulum::where('kode_nama_kurikulum', $id)->get()->first();
            $data['data'] = Kurikulum::with('matakuliah')->where('kode_nama_kurikulum', $data['select_kurikulun']->kode_nama_kurikulum)->OrderBy('semester', 'asc')->get()->groupBy('semester');
        } else {
            $data['nama_kurikulum'] = Nama_kurikulum::OrderBy('kode_nama_kurikulum', 'desc')->get();
            $data['select_kurikulun'] = Nama_kurikulum::OrderBy('kode_nama_kurikulum', 'desc')->get()->first();
            $data['data'] = Kurikulum::with('matakuliah')->where('kode_nama_kurikulum', $data['select_kurikulun']->kode_nama_kurikulum)->OrderBy('semester', 'asc')->get()->groupBy('semester');
        }
        $data['matakuliah'] = Matakuliah::where('kode_program_studi', $data['select_kurikulun']->kode_program_studi)->get();
        return view('admin.jurusan.kurikulum.data_kurikulum', $data);
    }
    public function store_data_kurikulum(Request $request)
    {
        foreach ($request->matakuliah as $key => $value) {
            Kurikulum::create(array(
                'kode_nama_kurikulum' => $request->kode_nama_kurikulum,
                'semester' => $request->semester,
                'id_matakuliah' => $value,
            ));
        }
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_data_kurikulum($id)
    {
        Kurikulum::where('kode_kurikulum', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    public function kurikulum_angkatan()
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'kurkulum';
        $data['title'] = 'Kurikulum Angkatan';
        $data['nama_kurikulum'] = Nama_kurikulum::orderBy('kode_nama_kurikulum', 'desc')->get();
        $data['data'] = Kurikulum_angkatan::with('prodi')->orderBy('kode_kurikulum_angkatan', 'desc')->get();
        return view('admin.jurusan.kurikulum.kurikulum_angkatan', $data);
    }
    public function store_kurikulum_angkatan(Request $request)
    {
        $data = array(
            'angkatan' => $request->angkatan,
            'ekstensi' => $request->ekstensi,
            'paket' => $request->paket,
            'kode_nama_kurikulum' => $request->kode_nama_kurikulum,
        );
        Kurikulum_angkatan::create($data);
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_kurikulum_angkatan(Request $request)
    {
        $data = array(
            'angkatan' => $request->angkatan,
            'ekstensi' => $request->ekstensi,
            'paket' => $request->paket,
            'kode_nama_kurikulum' => $request->kode_nama_kurikulum,
        );
        Kurikulum_angkatan::where('kode_kurikulum_angkatan', $request->kode_kurikulum_angkatan)->update($data);
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_kurikulum_angkatan($id)
    {
        Kurikulum_angkatan::where('kode_kurikulum_angkatan', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }

    public function matakuliah_prasyarat($id = null)
    {
        $data['nav'] = 'jurusan';
        $data['sub_nav'] = 'kurkulum';
        $data['title'] = 'Matakuliah Prasyarat';
        if ($id) {
            $data['nama_kurikulum'] = Nama_kurikulum::OrderBy('kode_nama_kurikulum', 'desc')->get();
            $data['select_kurikulun'] = Nama_kurikulum::where('kode_nama_kurikulum', $id)->get()->first();
            $data['data'] = MatakuliahPrasyarat::with('matakuliah_ambil', 'matakuliah_syarat')->where('kode_nama_kurikulum', $data['select_kurikulun']->kode_nama_kurikulum)->get();
        } else {
            $data['nama_kurikulum'] = Nama_kurikulum::OrderBy('kode_nama_kurikulum', 'desc')->get();
            $data['select_kurikulun'] = Nama_kurikulum::OrderBy('kode_nama_kurikulum', 'desc')->get()->first();
            $data['data'] = MatakuliahPrasyarat::with('matakuliah_ambil', 'matakuliah_syarat')->where('kode_nama_kurikulum', $data['select_kurikulun']->kode_nama_kurikulum)->get();
        }
        $data['matakuliah'] = Matakuliah::where('kode_program_studi', $data['select_kurikulun']->kode_program_studi)->get();
        return view('admin.jurusan.kurikulum.matakuliah_prasyarat', $data);
    }
    public function store_matakuliah_prasyarat(Request $request)
    {
        $data = array(
            'kode_nama_kurikulum' => $request->kode_nama_kurikulum,
            'id_matakuliah_ambil' => $request->matakuliah_diambil,
            'id_matakuliah_syarat' => $request->matakuliah_syarat,
            'jenis_prasyarat' => $request->jenis_prasyarat,
        );
        MatakuliahPrasyarat::create($data);
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_matakuliah_prasyarat(Request $request)
    {
        $data = array(
            'kode_nama_kurikulum' => $request->kode_nama_kurikulum,
            'id_matakuliah_ambil' => $request->matakuliah_diambil,
            'id_matakuliah_syarat' => $request->matakuliah_syarat,
            'jenis_prasyarat' => $request->jenis_prasyarat,
        );
        MatakuliahPrasyarat::where('kode_matakuliah_prasyarat', $request->kode_matakuliah_prasyarat)->update($data);
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_matakuliah_prasyarat($id)
    {
        MatakuliahPrasyarat::where('kode_matakuliah_prasyarat', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    public function dosen()
    {
        $data['nav'] = 'jurusan';
        $data['title'] = 'Dosen';
        $data['data'] = Dosen::join('program_studi','dosen.homebase','=','program_studi.kode_program_studi')
                                ->orderBy('kode_dosen')->get();
        $data['prodi'] = ProgramStudi::all();
        return view('admin.jurusan.dosen', $data);
    }
    public function store_dosen(Request $request)
    {
        $data = array(
            'nik' => $request->nik,
            'nama_dosen' => $request->nama_dosen,
            'field_studi' => $request->field_studi,
            'alumni' => $request->alumni,
            'homebase' => $request->homebase,
            'status_dosen' => $request->status_dosen,
            'status_login' => $request->status_login,
            'no_telp' => $request->no_telp,
            'sandi_pengguna' => $request->sandi_pengguna,
            'alamat_email' => $request->email,
        );
        if ($request->sandi_pengguna == $request->ulang_sandi_pengguna) {
            Dosen::create($data);
        } else {
            Alert::danger('Tambah Data Gagal', 'Kata Sandi Tidak Sama!')->autoClose(6000);
            return redirect()->back();
        }
        Alert::success('Tambah Data Berhasil', 'Data Telah Ditambahkan!')->autoClose(2000);
        return redirect()->back();
    }
    public function put_dosen(Request $request)
    {
        $data = array(
            'nik' => $request->nik,
            'nama_dosen' => $request->nama_dosen,
            'field_studi' => $request->field_studi,
            'alumni' => $request->alumni,
            'homebase' => $request->homebase,
            'status_dosen' => $request->status_dosen,
            'status_login' => $request->status_login,
            'no_telp' => $request->no_telp,
            'sandi_pengguna' => $request->sandi_pengguna,
            'alamat_email' => $request->email,
        );
        dosen::where('kode_dosen', $request->kode_dosen)->update($data);
        Alert::success('Update Data Berhasil', 'Data Telah Diperbaharui!')->autoClose(2000);
        return redirect()->back();
    }
    public function delete_dosen($id)
    {
        Dosen::where('kode_dosen', $id)->delete();
        Alert::success('Delete Data Berhasil', 'Data Telah Dihapus!')->autoClose(2000);
        return redirect()->back();
    }
    public function perwalian()
    {
        $data['nav'] = 'jurusan';
        $data['title'] = 'Dosen';
        $data['data'] = [];
        $data['dosen'] = Dosen::all();
        $data['mahasiswa'] = Mahasiswa::all();
        $data['angkatan'] = TahunAkademik::select('tahun_akademik')->where('semester','1')->orderBy('kode_tahun_akademik','desc')->get();
        $data['jurusan'] = ProgramStudi::all();
        return view('admin.jurusan.perwalian', $data);
    }
    public function store_perwalian(Request $reques){
        $data = $reques->nim_mhs;
        echo json_encode($data);
    }
}
