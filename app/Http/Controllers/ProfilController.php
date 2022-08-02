<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        // return User::where('id', auth()->user()->id)->get();
        return view('dashboard.profil',[
            'judul' => 'Profil',
            'data' => User::where('id', auth()->user()->id)->get()

        ]);
    }
   
  
}
