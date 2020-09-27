<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Redirect,Response;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = Siswa::all();
        return view('index', compact('data_siswa'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'=>'required|max:50',
            'kelas'=>'required|min:1|max:5',
            'jurusan'=>'required|min:1|max:5',
        ]);
        $siswa = new Siswa();
        $siswa->nama = $validateData['nama'];
        $siswa->kelas = $validateData['kelas'];
        $siswa->jurusan = $validateData['jurusan'];
        
        Siswa::create($siswa);
        return response()->json(['pesanSuccess'=>"Data berhasil di tambah."]);
    }
}
