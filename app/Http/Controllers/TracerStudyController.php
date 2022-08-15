<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TracerStudy;

class TracerStudyController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_role_id == 1) {
            $data = [
                'judul' => 'Tracer Study',
                'data' => TracerStudy::getAll()
            ];
            return view ('dashboard.admin.tracer_study',$data);
        }else{
            $data = [
                'judul' => 'Tracer Study',
                'data' => TracerStudy::find(auth()->user()->id)
            ];
             return view ('dashboard.tracerstudy',$data);
        }
        
    }

    public function update(Request $request){
        
        $data = [
            'user_id' => ['user_id' => auth()->user()->id],
            'tracer_study' => [
                'ipk' => $request->input('ipk'),
                'thn_lulus' => $request->input('thn_lulus'),
                'tmp_kerja' => $request->input('tmp_kerja'),
                'bidang' => $request->input('bidang'),
                'jabatan' => $request->input('jabatan'),
                'thn_mulai_kerja' => $request->input('thn_mulai_kerja'),
                'foto' => $request->input('foto'),
            ]
        ];
        TracerStudy::saveData($data);
        return back()->with('success','Tracer Study Updated!');
    }
}