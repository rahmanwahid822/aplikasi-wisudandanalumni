<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yudisium;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class YudisiumController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_role_id == 1) {
            
            $data = [
                'judul' => 'Validasi Data Yudisium',
                'users' => User::allYudisiumFile()
            ];
            return view('dashboard.admin.yudisium',$data);
        }
        $data = [
            'judul' => 'Data Yudisium',
            'bukti_perpus' => Yudisium::getRowData(auth()->user()->id,1),
            'bukti_revisi' => Yudisium::getRowData(auth()->user()->id,2),
            'bukti_legalijazah' => Yudisium::getRowData(auth()->user()->id,3),
            'bukti_legalkk' => Yudisium::getRowData(auth()->user()->id,4),
            'bukti_akta' => Yudisium::getRowData(auth()->user()->id,5),
            'bukti_khs' => Yudisium::getRowData(auth()->user()->id,6),
            'bukti_pkn' => Yudisium::getRowData(auth()->user()->id,7),
            'bukti_ta' => Yudisium::getRowData(auth()->user()->id,8),
            'bukti_linkta' => Yudisium::getRowData(auth()->user()->id,9),
        ];
        return view('dashboard.datayudisium', $data);
    }

    public function validation($id){
        $data = [
            'judul' => 'Validasi Data Yudisium',
            'nama' => User::find($id)->nama,
            'bukti_perpus' => Yudisium::getRowData($id,1),
            'bukti_revisi' => Yudisium::getRowData($id,2),
            'bukti_legalijazah' => Yudisium::getRowData($id,3),
            'bukti_legalkk' => Yudisium::getRowData($id,4),
            'bukti_akta' => Yudisium::getRowData($id,5),
            'bukti_khs' => Yudisium::getRowData($id,6),
            'bukti_pkn' => Yudisium::getRowData($id,7),
            'bukti_ta' => Yudisium::getRowData($id,8),
            'bukti_linkta' => Yudisium::getRowData($id,9),
        ];
        return view('dashboard.admin.yudisium_validation', $data);
    }

    public function is_valid(Request $request, $id, $param){
        $file = Yudisium::find($id);
        $file->is_valid = $param;
        if($param == 1){
            $file->keterangan = "";
        }else{
            $file->keterangan = $request->input('keterangan');
        }
        $file->save();
        return back()->with('success','Validasi file berhasil!');
    }



    public function update(Request $request, $id)
    {
        // $bukti = $request->file('bukti_perpus')->store('yudisium');
        $validation = $request->validate([
            'bukti_perpus' => 'image|file|max:1024',
            'bukti_revisi' => 'image|file|max:1024',
            'bukti_legalijazah' => 'image|file|max:1024',
            'bukti_legalkk' => 'image|file|max:1024',
            'bukti_akta' => 'image|file|max:1024',
            'bukti_khs' => 'image|file|max:1024',
            'bukti_pkn' => 'image|file|max:1024',
        ]);
        
        if($request->file('bukti_perpus')){$this->saveFileYudisium($request, 'bukti_perpus',1, true);}
        if($request->file('bukti_revisi')){$this->saveFileYudisium($request, 'bukti_revisi',2, true);}
        if($request->file('bukti_legalijazah')){$this->saveFileYudisium($request, 'bukti_legalijazah',3, true);}
        if($request->file('bukti_legalkk')){$this->saveFileYudisium($request, 'bukti_legalkk',4, true);}
        if($request->file('bukti_akta')){$this->saveFileYudisium($request, 'bukti_akta',5, true);}
        if($request->file('bukti_khs')){$this->saveFileYudisium($request, 'bukti_khs',6, true);}
        if($request->file('bukti_pkn')){$this->saveFileYudisium($request, 'bukti_pkn',7, true);}
        if($request->input('bukti_ta')){$this->saveFileYudisium($request, 'bukti_ta',8, false);}
        if($request->input('bukti_linkta')){$this->saveFileYudisium($request, 'bukti_linkta',9, false);}

        return redirect('/yudisium')->with('success','Update Data Yudisium Berhasil !');
    }

    private function saveFileYudisium(Request $request, $jenis_file, $id_jenis_file, $is_file){
        // 1. Id_file is exists in yudisium_validation table ?
        // 2. If true update file field in yudisium_file table, if false insert it
        if(Yudisium::isFileExists(auth()->user()->id,$id_jenis_file)){
            // a. get parameters
            $id_yudisium = Yudisium::getIdYudisiumValidation(auth()->user()->id,$id_jenis_file);
            $yudisium_validation = Yudisium::find($id_yudisium);

            //c. update yudisium_file table
            $data = ['id' => ['id' => $yudisium_validation->yudisium_file_id]];
            if($is_file == true){
                // c.1 if is_file == true, delete old file from storage and upload new file
                $filename = Yudisium::getFileName($yudisium_validation->yudisium_file_id);
                Storage::delete($filename);
                $data['file'] = ['file' => $request->file($jenis_file)->store('yudisium')];
            }else{
                // c.2 if is_file == false, just update the text input into db
                $data['file'] = ['file' => $request->input($jenis_file)];
            }
            Yudisium::saveFile($data); 
            
            // d. reset is_valid to 0
            $yudisium_validation->is_valid = 0;
            $yudisium_validation->save();
        }else{
            //upload new file and insert data to yudisium_file table
            $data = ['id' => ['id' => null]];
            if($is_file){
                // d.1 if is_file == true, upload new file
                $data['file'] = ['file' => $request->file($jenis_file)->store('yudisium')];
            }else{
                // d.2 if is_file == false, just update the text input into db
                $data['file'] = ['file' => $request->input($jenis_file)];
            }
            Yudisium::saveFile($data); 
            // Insert Data to yudisium_validation table
            $file = new Yudisium;
            $file->user_id = auth()->user()->id;
            $file->yudisium_file_id = Yudisium::getLastIdFile();
            $file->yudisium_jenis_file_id = $id_jenis_file;
            $file->save();
        }
    }
}
      