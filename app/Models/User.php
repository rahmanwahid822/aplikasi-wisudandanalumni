<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $guarded = ['id','created_at','updated_at'];

    public function allYudisiumFile(){
        return DB::table('user')
                ->select(DB::raw('user.*,user_role.role, 
                    (SELECT COUNT(*) FROM wisuda_validation WHERE is_valid = 1 AND user_id = user.id) AS tervalidasi,
                    (SELECT COUNT(*) FROM yudisium_validation WHERE is_valid = 0 AND user_id = user.id) AS belum_valid,
                    (9-(SELECT COUNT(*) FROM yudisium_validation WHERE is_valid = 1 AND user_id = user.id)-(SELECT COUNT(*) FROM yudisium_validation WHERE is_valid = 0 AND user_id = user.id)) AS belum_upload
                    ')
                )
                ->join('user_role', 'user.user_role_id','=','user_role.id')
                ->where('user_role_id','!=','1')
                ->get();
    }
    
    public function allWisudaFile(){
        return DB::table('user')
                ->select(DB::raw('user.*,user_role.role, 
                    (SELECT COUNT(*) FROM wisuda_validation WHERE is_valid = 1 AND user_id = user.id) AS tervalidasi,
                    (SELECT COUNT(*) FROM wisuda_validation WHERE is_valid = 0 AND user_id = user.id) AS belum_valid,
                    (9-(SELECT COUNT(*) FROM wisuda_validation WHERE is_valid = 1 AND user_id = user.id)-(SELECT COUNT(*) FROM wisuda_validation WHERE is_valid = 0 AND user_id = user.id)) AS belum_upload
                    ')
                )
                ->join('user_role', 'user.user_role_id','=','user_role.id')
                ->where('user_role_id','!=','1')
                ->get();
    }
}