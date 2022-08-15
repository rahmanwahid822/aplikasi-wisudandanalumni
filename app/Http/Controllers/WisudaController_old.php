<?php

namespace App\Http\Controllers;
use App\Models\Wisuda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisudaController extends Controller
{
    public function index()
    {
        $jenis_file = Wisuda::getJenisFile();
        $data = [
            'judul' => 'Data Wisuda',
            'data' =>  $jenis_file
        ];
        return view('dashboard.datawisuda', $data);
    }


    public function store(Request $request)
    {
        Datawisuda::create([
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()
            ->with('success', 'Form berhasil dibuat');
    }

    public function update(Request $request, $id)
    {

        $datawisuda = Datawisuda::find($id);

        if ($request->hasFile('bukti_lunasijazahwisuda')) {
            $lunasijazahwisuda = Storage::disk('public')->putFile('datawisuda', request()->file('bukti_lunasijazahwisuda'), 'public');
            $datawisuda->update([
                'bukti_lunasijazahwisuda' => $lunasijazahwisuda,
            ]);
        } elseif ($request->hasFile('bukti_pembayaranperpus')) {
            $pembayaranperpus = Storage::disk('public')->putFile('datawisuda', request()->file('bukti_pembayaranperpus'), 'public');
            $datawisuda->update([
                'bukti_pembayaranperpus' => $pembayaranperpus,
            ]);
        } elseif ($request->hasFile('bukti_sumbanganalumni')) {
            $sumbanganalumni = Storage::disk('public')->putFile('datawisuda', request()->file('bukti_sumbanganalumni'), 'public');
            $datawisuda->update([
                'bukti_sumbanganalumni' => $sumbanganalumni,
            ]);
        } elseif ($request->hasFile('bukti_fototigaempat')) {
            $fototigaempat = Storage::disk('public')->putFile('datawisuda', request()->file('bukti_fototigaempat'), 'public');
            $datawisuda->update([
                'bukti_fototigaempat' => $fototigaempat,
            ]);
        } elseif ($request->hasFile('bukti_fotoduatiga')) {
            $fotoduatiga = Storage::disk('public')->putFile('datawisuda', request()->file('bukti_fotoduatiga'), 'public');
            $datawisuda->update([
                'bukti_fotoduatiga' => $fotoduatiga,
            ]);
        } elseif ($request->hasFile('bukti_empatenam')) {
            $empatenam = Storage::disk('public')->putFile('datawisuda', request()->file('bukti_empatenam'), 'public');
            $datawisuda->update([
                'bukti_empatenam' => $empatenam,
            ]);
        } elseif ($request->hasFile('bukti_laporanta')) {
            $laporanta = Storage::disk('public')->putFile('datawisuda', request()->file('bukti_laporanta'), 'public');
            $datawisuda->update([
                'bukti_laporanta' => $laporanta,
            ]);
        }

        $datawisuda->update([
            'bukti_laporanpkn'=>$request->bukti_laporanpkn,
            'bukti_linkta'=>$request->bukti_linkta,
        ]);


        return redirect()->back()
            ->with('success', 'Data berhasil diunggah');
    }
}