<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Datayudisium;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index () 
    {
        return view('register',[
            'judul' => 'Register',

        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request-> validate([
            'nama' => 'required|min:5|max:255',
            'nim' => 'required|min:8|max:8|unique:users',
            'username' => ['required','min:3','max:255','unique:users'],
            'email'=> 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
            'nik' => 'required|min:16|max:16|unique:users',
            'tanggallahir' => 'required',
            'tempatlahir' => 'required',
            'jeniskelamin' => 'required',
            'prodi' => 'required'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']); 
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        return redirect('/login')->with('success','Registrasi Berhasil! Silahkan Login');
    }
} 
