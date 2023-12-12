<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\petugas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PengaduanController extends Controller
{
    function index()
    {
        $judul = "Pengaduan Home";
        $pengaduan = pengaduan::all();

        return view('home', ['TextJudul' =>  $judul, 'pengaduan' => $pengaduan]);
        // $pengaduan = DB::table('pengaduan')->get();
    }

    function tampil_pengaduan()
    {
        $judul = "selamat datang";

        return view('isi-pengaduan', ['TextJudul' =>  $judul,]);
    }

    function proses_tambah_pengaduan(Request $request)
    {
        $nama_foto=$request->foto->getClientOriginalName();
        
        $request->validate([
            'isi_laporan' => 'required|min:5'
        ]);
      
        $request->foto->storeAs('public/image',$nama_foto);

        $isi_pengaduan = $request->isi_laporan;
        $nik = $request->nik;
        
        DB::table('pengaduan')->insert([
            'tgl_pengaduan' => date('y-m-d'),
            'nik' => auth::user()->nik,
            'isi_laporan' => $isi_pengaduan,
            'foto' => $request->foto->getClientOriginalName(),
            'status' => '0'
        ]);

        
        return redirect('/home');
    }

    function hapus($id)
    {
        echo $id;
        $deleted = DB::table('pengaduan')->where('id_pengaduan', $id)->delete();
        if ($deleted) {
            return redirect('/home');
        }
    }

    function detail_pengaduan($id)
    {
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan', $id)->first();
        $petugas = DB::table('petugas')->get();
        $tampil_tanggapan = DB::table('tanggapan')->get();
        $tanggapan = DB::table('tanggapan')
            ->join('pengaduan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
            ->join('petugas', 'petugas.id', '=', 'tanggapan.id')
            ->select('pengaduan.*', 'tanggapan.*', )
            ->get();
        

        return view('detail-pengaduan', ['tampil_tanggapan'=> $tampil_tanggapan,'petugas' => $petugas, 'tanggapan' => $tanggapan, 'pengaduan' => $pengaduan]);

    }

    function update_pengaduan($id)
    {
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan', $id)->first();
        return view('update-pengaduan', ['pengaduan' => $pengaduan]);

    }

    function proses_update_pengaduan(Request $request, $id){
        $isi_laporan = $request->isi_laporan;

        DB::table('pengaduan')
        ->where('id_pengaduan', $id)
        ->update(['isi_laporan' => $isi_laporan]);

    return redirect('/home');
    }
}
