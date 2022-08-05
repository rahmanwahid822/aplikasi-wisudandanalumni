<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datayudisium;
use App\Models\User;

class DatayudisiumController extends Controller
{
    public function index()
    {
      
        return view('dashboard.datayudisium',[
            'judul'=>'Data Yudisium',
            // 'data' => $datayudisium->user,
        // return view('dashboard.datayudisium',[
        //     'judul' => 'Data Yudisium',
            'data' => Datayudisium::all(),
        //     'dataisi' => User::all()
        ]);
    }
}

