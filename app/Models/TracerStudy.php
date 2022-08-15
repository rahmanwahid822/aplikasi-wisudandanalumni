<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class TracerStudy extends Authenticatable
{
    protected $table = 'tracer_study';
    protected $guarded = ['id','created_at','updated_at'];

    public function saveData($data){
        return DB::table('tracer_study')->updateOrInsert($data['user_id'], $data['tracer_study']);
    }

    public function getAll(){
        return DB::table('tracer_study')->select('user.nim','user.nama', 'user.prodi', 'user.angkatan', 'tracer_study.*')
                    ->join('user', 'user.id','=','tracer_study.user_id')->get();
    }

}