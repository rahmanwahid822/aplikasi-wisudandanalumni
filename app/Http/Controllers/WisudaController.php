<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisuda;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class WisudaController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_role_id == 1) {
            
            $data = [
                'judul' => 'Validasi Data Wisuda',
                'users' => User::allWisudaFile()
            ];
            return view('dashboard.admin.wisuda',$data);
        }
        $data = [
            'judul' => 'Data Wisuda',
            'bukti_lunasijazahwisuda' => Wisuda::getRowData(auth()->user()->id,1),
            'bukti_pembayaranperpus' => Wisuda::getRowData(auth()->user()->id,2),
            'bukti_sumbanganalumni' => Wisuda::getRowData(auth()->user()->id,3),
            'bukti_fototigaempat' => Wisuda::getRowData(auth()->user()->id,4),
            'bukti_fotoduatiga' => Wisuda::getRowData(auth()->user()->id,5),
            'bukti_empatenam' => Wisuda::getRowData(auth()->user()->id,6),
            'bukti_laporanta' => Wisuda::getRowData(auth()->user()->id,7),
            'bukti_laporanpkn' => Wisuda::getRowData(auth()->user()->id,8),
            'bukti_linkta' => Wisuda::getRowData(auth()->user()->id,9),
        ];
        return view('dashboard.datawisuda', $data);
    }

    public function validation($id){
        $data = [
            'judul' => 'Validasi Data Wisuda',
            'nama' => User::find($id)->nama,
            'bukti_lunasijazahwisuda' => Wisuda::getRowData($id,1),
            'bukti_pembayaranperpus' => Wisuda::getRowData($id,2),
            'bukti_sumbanganalumni' => Wisuda::getRowData($id,3),
            'bukti_fototigaempat' => Wisuda::getRowData($id,4),
            'bukti_fotoduatiga' => Wisuda::getRowData($id,5),
            'bukti_empatenam' => Wisuda::getRowData($id,6),
            'bukti_laporanta' => Wisuda::getRowData($id,7),
            'bukti_laporanpkn' => Wisuda::getRowData($id,8),
            'bukti_linkta' => Wisuda::getRowData($id,9),
        ];
        return view('dashboard.admin.wisuda_validation', $data);
    }

    public function is_valid(Request $request, $id, $param){
        $file = Wisuda::find($id);
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
        // $bukti = $request->file('bukti_lunasijazahwisuda')->store('wisuda');
        $validation = $request->validate([
            'bukti_lunasijazahwisuda' => 'file|max:1024',
            'bukti_pembayaranperpus' => 'file|max:1024',
            'bukti_sumbanganalumni' => 'file|max:1024',
            'bukti_fototigaempat' => 'file|max:1024',
            'bukti_fotoduatiga' => 'file|max:1024',
            'bukti_empatenam' => 'file|max:1024',
            'bukti_laporanta' => 'file|max:1024',
        ]);
        
        if($request->file('bukti_lunasijazahwisuda')){$this->saveFileWisuda($request, 'bukti_lunasijazahwisuda',1, true);}
        if($request->file('bukti_pembayaranperpus')){$this->saveFileWisuda($request, 'bukti_pembayaranperpus',2, true);}
        if($request->file('bukti_sumbanganalumni')){$this->saveFileWisuda($request, 'bukti_sumbanganalumni',3, true);}
        if($request->file('bukti_fototigaempat')){$this->saveFileWisuda($request, 'bukti_fototigaempat',4, true);}
        if($request->file('bukti_fotoduatiga')){$this->saveFileWisuda($request, 'bukti_fotoduatiga',5, true);}
        if($request->file('bukti_empatenam')){$this->saveFileWisuda($request, 'bukti_empatenam',6, true);}
        if($request->file('bukti_laporanta')){$this->saveFileWisuda($request, 'bukti_laporanta',7, true);}
        if($request->input('bukti_laporanpkn')){$this->saveFileWisuda($request, 'bukti_laporanpkn',8, false);}
        if($request->input('bukti_linkta')){$this->saveFileWisuda($request, 'bukti_linkta',9, false);}

        return redirect('/wisuda')->with('success','Update Data Wisuda Berhasil !');
    }

    private function saveFileWisuda(Request $request, $jenis_file, $id_jenis_file, $is_file){
        // 1. Id_file is exists in wisuda_validation table ?
        // 2. If true update file field in wisuda_file table, if false insert it
        if(Wisuda::isFileExists(auth()->user()->id,$id_jenis_file)){
            // a. get parameters
            $id_wisuda = Wisuda::getIdWisudaValidation(auth()->user()->id,$id_jenis_file);
            $wisuda_validation = Wisuda::find($id_wisuda);

            //c. update wisuda_file table
            $data = ['id' => ['id' => $wisuda_validation->wisuda_file_id]];

            if($is_file == true){
                // c.1 if is_file == true, delete old file from storage and upload new file
                $filename = Wisuda::getFileName($wisuda_validation->wisuda_file_id);
                Storage::delete($filename);
                $data['file'] = ['file' => $request->file($jenis_file)->store('wisuda')];
            }else{
                // c.2 if is_file == false, just update the text input into db
                $data['file'] = ['file' => $request->input($jenis_file)];
            }
            Wisuda::saveFile($data); 
            // d. reset is_valid to 0
            $wisuda_validation->is_valid = 0;
            $wisuda_validation->save();
        }else{
            //upload new file and insert data to wisuda_file table
            $data = ['id' => ['id' => null]];
            if($is_file){
                // d.1 if is_file == true, upload new file
                $data['file'] = ['file' => $request->file($jenis_file)->store('wisuda')];
            }else{
                // d.2 if is_file == false, just update the text input into db
                $data['file'] = ['file' => $request->input($jenis_file)];
            }
            Wisuda::saveFile($data); 
            // Insert Data to wisuda_validation table
            $file = new Wisuda;
            $file->user_id = auth()->user()->id;
            $file->wisuda_file_id = Wisuda::getLastIdFile();
            $file->wisuda_jenis_file_id = $id_jenis_file;
            $file->save();
        }
    }
}
      