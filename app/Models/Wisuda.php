<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Wisuda extends Model
{
    use HasFactory;

    protected $table = 'wisuda_validation';
    protected $guarded = ['id','created_at','updated_at'];

    public function getData($id_user){
        return DB::table('wisuda_validation')
                ->select('wisuda_jenis_file_id as id_jenis_file','wisuda_validation.keterangan','wisuda_file_id as id_file','wisuda_file.file', 'wisuda_jenis_file.jenis_file','is_valid','created_at','updated_at')
                ->join('wisuda_file','wisuda_validation.wisuda_file_id', '=', 'wisuda_file.id')
                ->join('wisuda_jenis_file','wisuda_validation.wisuda_jenis_file_id', '=', 'wisuda_jenis_file.id')
                ->where('wisuda_validation.user_id','=',$id_user)
                ->get();
    }

    public function getRowData($id_user,$id_jenis_file){
            return DB::table('wisuda_validation')
                ->select('wisuda_validation.id as id','wisuda_validation.keterangan','wisuda_jenis_file_id as id_jenis_file','wisuda_file_id as id_file','wisuda_file.file', 'wisuda_jenis_file.jenis_file','is_valid','created_at','updated_at')
                ->join('wisuda_file','wisuda_validation.wisuda_file_id', '=', 'wisuda_file.id')
                ->join('wisuda_jenis_file','wisuda_validation.wisuda_jenis_file_id', '=', 'wisuda_jenis_file.id')
                ->where('wisuda_validation.user_id','=',$id_user)
                ->where('wisuda_validation.wisuda_jenis_file_id','=',$id_jenis_file)
                ->first();
    }

    public function saveFile($data){
       DB::table('wisuda_file')->updateOrInsert($data['id'], $data['file']);
    }

    public function getLastIdFile(){
        return DB::table('wisuda_file')->latest('id')->first()->id;
    }
    
    public function getIdWisudaValidation($id_user,$id_jenis_file){
        $data = [
            'user_id' => $id_user,
            'wisuda_jenis_file_id' => $id_jenis_file
        ];
        return DB::table('wisuda_validation')->where($data)->first()->id;
    }

    public function getFileName($id){
        return DB::table('wisuda_file')->where('id',$id)->first()->file;
    }

    public function isFileExists($id_user,$id_jenis_file){
        $data = [
            'user_id' => $id_user,
            'wisuda_jenis_file_id' => $id_jenis_file
        ];
        return DB::table('wisuda_validation')->where($data)->exists();
    }

}