<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datayudisium;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DatayudisiumController extends Controller
{
    public function index()
    {
        // return view('dashboard.datayudisium',[
        //     'judul'=>'Data Yudisium',
        //     // 'data' => $datayudisium->user,
        // // return view('dashboard.datayudisium',[
        // //     'judul' => 'Data Yudisium',
        //     'data' => Datayudisium::all(),
        // //     'dataisi' => User::all()
        // ]);

        $datas = Datayudisium::all();

        return view('dashboard.datayudisium', compact('datas'), [
            'judul' => 'Data Yudisium',
        ]);
    }

    public function store(Request $request)
    {
        Datayudisium::create([
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()
            ->with('success', 'Form berhasil dibuat');
    }

    public function update(Request $request, $id)
    {

        $datayudisium = Datayudisium::find($id);

        if ($request->hasFile('bukti_perpus')) {
            $perpus = Storage::disk('public')->putFile('datayudisium', request()->file('bukti_perpus'), 'public');
            $datayudisium->update([
                'bukti_perpus' => $perpus,
            ]);
        } elseif ($request->hasFile('bukti_revisi')) {
            $revisi = Storage::disk('public')->putFile('datayudisium', request()->file('bukti_revisi'), 'public');
            $datayudisium->update([
                'bukti_revisi' => $revisi,
            ]);
        } elseif ($request->hasFile('bukti_legalijazah')) {
            $legalijazah = Storage::disk('public')->putFile('datayudisium', request()->file('bukti_legalijazah'), 'public');
            $datayudisium->update([
                'bukti_legalijazah' => $legalijazah,
            ]);
        } elseif ($request->hasFile('bukti_legalkk')) {
            $legalkk = Storage::disk('public')->putFile('datayudisium', request()->file('bukti_legalkk'), 'public');
            $datayudisium->update([
                'bukti_legalkk' => $legalkk,
            ]);
        } elseif ($request->hasFile('bukti_akta')) {
            $akta = Storage::disk('public')->putFile('datayudisium', request()->file('bukti_akta'), 'public');
            $datayudisium->update([
                'bukti_akta' => $akta,
            ]);
        } elseif ($request->hasFile('bukti_khs')) {
            $khs = Storage::disk('public')->putFile('datayudisium', request()->file('bukti_khs'), 'public');
            $datayudisium->update([
                'bukti_khs' => $khs,
            ]);
        } elseif ($request->hasFile('bukti_pkn')) {
            $pkn = Storage::disk('public')->putFile('datayudisium', request()->file('bukti_pkn'), 'public');
            $datayudisium->update([
                'bukti_pkn' => $pkn,
            ]);
        }

        $datayudisium->update([
            'bukti_ta' => $request->bukti_ta,
            'bukti_linkta' => $request->bukti_linkta,
        ]);


        return redirect()->back()
            ->with('success', 'Data berhasil diunggah');
    }
}
