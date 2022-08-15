<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Yudisium extends Model
{
    use HasFactory;

    protected $table = 'yudisium_validation';
    protected $guarded = ['id','created_at','updated_at'];

    public function getData($id_user){
        return DB::table('yudisium_validation')
                ->select('yudisium_jenis_file_id as id_jenis_file','yudisium_validation.keterangan','yudisium_file_id as id_file','yudisium_file.file', 'yudisium_jenis_file.jenis_file','is_valid','created_at','updated_at')
                ->join('yudisium_file','yudisium_validation.yudisium_file_id', '=', 'yudisium_file.id')
                ->join('yudisium_jenis_file','yudisium_validation.yudisium_jenis_file_id', '=', 'yudisium_jenis_file.id')
                ->where('yudisium_validation.user_id','=',$id_user)
                ->get();
    }

    public function getRowData($id_user,$id_jenis_file){
            return DB::table('yudisium_validation')
                ->select('yudisium_validation.id as id','yudisium_validation.keterangan','yudisium_jenis_file_id as id_jenis_file','yudisium_file_id as id_file','yudisium_file.file', 'yudisium_jenis_file.jenis_file','is_valid','created_at','updated_at')
                ->join('yudisium_file','yudisium_validation.yudisium_file_id', '=', 'yudisium_file.id')
                ->join('yudisium_jenis_file','yudisium_validation.yudisium_jenis_file_id', '=', 'yudisium_jenis_file.id')
                ->where('yudisium_validation.user_id','=',$id_user)
                ->where('yudisium_validation.yudisium_jenis_file_id','=',$id_jenis_file)
                ->first();
    }

    public function saveFile($data){
       DB::table('yudisium_file')->updateOrInsert($data['id'], $data['file']);
    }

    public function getLastIdFile(){
        return DB::table('yudisium_file')->latest('id')->first()->id;
    }
    
    public function getIdYudisiumValidation($id_user,$id_jenis_file){
        $data = [
            'user_id' => $id_user,
            'yudisium_jenis_file_id' => $id_jenis_file
        ];
        return DB::table('yudisium_validation')->where($data)->first()->id;
    }

    public function getFileName($id){
        return DB::table('yudisium_file')->where('id',$id)->first()->file;
    }

    public function isFileExists($id_user,$id_jenis_file){
        $data = [
            'user_id' => $id_user,
            'yudisium_jenis_file_id' => $id_jenis_file
        ];
        return DB::table('yudisium_validation')->where($data)->exists();
    }

}