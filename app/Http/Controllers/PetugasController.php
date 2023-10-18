<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    function index(){
        $judul ="Selamat Datang Di Petugas";

        $petugas = DB::table('petugas')->get();
        return view('petugas',['TextJudul' =>  $judul, 'petugas' => $petugas]);
    }

    function tampil_petugas(){
        $judul = "Tambah Petugas";

        return view('isi-petugas',['TextJudul' =>  $judul,]);
    }
    function proses_tambah_petugas(Request $request){
        $request->validate([
            'nama_petugas' => 'required|min:1'
        ]);
        $nama = $request -> nama_petugas;
        $username = $request -> username;
        $password = $request -> password;
        $telepon = $request -> telepon;
        

        DB::table('petugas')->insert([
            'nama_petugas' => $nama,
            'username' => $username,
            'password' => $password,
            'telepon' => $telepon,
            
        ]);

        return redirect('/petugas');
    }

    function hapus($id)
    {
        echo $id;
        $deleted = DB::table('petugas')->where('id_petugas', $id)->delete();
        if ($deleted) {
            return redirect('/petugas');
        }
    }

    function detail_petugas($id)
    {
        $petugas = DB::table('petugas')->where('id_petugas', $id)->first();
        return view('detail-petugas', ['petugas' => $petugas]);
    }

    function update_petugas($id)
    {
        $petugas = DB::table('petugas')->where('id_petugas', $id)->first();
        return view('update-petugas', ['petugas' => $petugas]);
    }

    function proses_update_petugas(Request $request, $id){
        $nama_petugas = $request->nama;

        DB::table('petugas')
        ->where('id_petugas', $id)
        ->update(['nama_petugas' => $nama_petugas]);

    return redirect('/petugas');
    }

}
