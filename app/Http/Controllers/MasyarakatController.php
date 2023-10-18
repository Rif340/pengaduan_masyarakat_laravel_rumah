<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{
    function index(){
        $judul ="Selamat Datang Di Masyarakat";

        $masyarakat = DB::table('masyarakat')->get();
        return view('masyarakat',['TextJudul' =>  $judul, 'masyarakat' => $masyarakat]);
    }

    function tampil_masyarakat(){
        $judul = "Selamat Datang Di Tambah Masyarakat";

        return view('isi-masyarakat',['TextJudul' =>  $judul,]);
    }
    function proses_tambah_masyarakat(Request $request){
        $request->validate([
            'nik' => 'required|min:1'
        ]);
        $nik = $request -> nik;
        $nama = $request -> nama;
        $username = $request -> username;
        $password = $request -> password;
        $telepon = $request -> telepon;

        DB::table('masyarakat')->insert([
            'nik' => $nik,
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'telepon' => $telepon
        ]);

        return redirect('/masyarakat');
    }

    function hapus($nik)
    {
        echo $nik;
        $deleted = DB::table('masyarakat')->where('nik', $nik)->delete();
        if ($deleted) {
            return redirect('/masyarakat');
        }
    }

    function detail_masyarakat($nik)
    {
        $masyarakat = DB::table('masyarakat')->where('nik', $nik)->first();
        return view('detail-masyarakat', ['masyarakat' => $masyarakat]);
    }

    function update_masyarakat($nik)
    {
        $masyarakat = DB::table('masyarakat')->where('nik', $nik)->first();
        return view('update-masyarakat', ['masyarakat' => $masyarakat]);

    }

    function proses_update_masyarakat(Request $request, $nik){
        $nama = $request->nama;

        DB::table('masyarakat')
        ->where('nik', $nik)
        ->update(['nama' => $nama]);

    return redirect('/masyarakat');
    }

}
