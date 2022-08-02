<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IsiyudisiumController extends Controller
{
    public function index()
    {
        return view ('dashboard.isiyudisium',[
            'judul'=> 'YUDISIUM',
            'data' => User::where('id', auth()->user()->id)->get()
        ]);
    }
}
