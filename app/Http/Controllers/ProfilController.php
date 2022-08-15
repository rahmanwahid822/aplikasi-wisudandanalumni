<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        $data = [
            'judul' => 'Profil',
            'data' => User::find(auth()->user())
        ];
        return view('dashboard.profil',$data);
    }

    public function update(Request $request, $id){
        $data = User::find($id);
        $data->nama = $request->nama;
        $data->nim = $request->nim;
        $data->nik = $request->nik;
        $data->tmp_lahir = $request->tmp_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->alamat = $request->alamat;
        $data->ayah = $request->ayah;
        $data->ibu = $request->ibu;
        $data->jns_kelamin = $request->jns_kelamin;
        $data->jns_kelamin = $request->jns_kelamin;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->save();
        return back()->with('success', 'Profile berhasil diupdate');
    }
   
  
}