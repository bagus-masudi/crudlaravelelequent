<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// panggil model guru
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        // mengambil data guru
        $guru = Guru::all();
        
        // mengirim data guru ke view guru
        return view('guru', ['guru' => $guru]);
    }

    public function tambah()
    {
        return view('guru_tambah');
    }

    public function simpan(Request $request)
    {
        $this->validate($request,[
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required'
        ]);
        
        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);
        
        return redirect('/guru');
    }

    public function edit($id)
    {
         $guru = Guru::find($id);
        return view('guru_edit', ['guru' => $guru]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required'
        ]);
        
        $guru = Guru::find($id);
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->alamat = $request->alamat;
        $guru->save();
        
        return redirect('/guru');
    }

    public function delete($id)
{
    $guru = Guru::find($id);
    $guru->delete();
    
    return redirect()->back();
}
}