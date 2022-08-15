@extends('dashboard.layouts.main')
@section('css')
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('isikonten')

    <div class="container-fluid">

        @if (count($errors) > 0)
            @foreach ($errors->all() as $message)
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>{{ $message }}</span>
                </div>
            @endforeach
        @endif

        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ \Session::get('success') }}
            </div>
        @endif

        <div class="block-header">
            <h2>{{ $judul }}</h2>
        </div>
        <!-- Bordered Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA KELENGKAPAN FORMULIR WISUDA
                            <small>Atas nama <code> {{ auth()->user()->nama }}</code> </small>
                        </h2>
                    </div>
                    <div class="body">
                        <form class="form"
                            action = '/wisuda/{{ auth()->user()->id }}' 
                            {{-- action = '/wisuda'  --}}
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th> NO</th>
                                        <th> URAIAN</th>
                                        <th> FILE UPLOAD </th>
                                        <th> STATUS VALIDASI </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Bukti Pembayaran Biaya Ijazah & Wisuda</td>
                                        <td><input type="file" class="form-control" name="bukti_lunasijazahwisuda" value="tes"/>
                                            File:
                                            @if($bukti_lunasijazahwisuda)
                                                <a href="{{ asset('storage/'.$bukti_lunasijazahwisuda->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif
                                        </td>
                                        <td>
                                            @if($bukti_lunasijazahwisuda)
                                                @if($bukti_lunasijazahwisuda->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_lunasijazahwisuda->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diupload</span> 
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Bukti Pembayaran Biaya Perpustakaan</td>
                                        <td><input type="file" class="form-control" name="bukti_pembayaranperpus" />
                                            File:
                                            @if($bukti_pembayaranperpus)
                                                <a href="{{ asset('storage/'.$bukti_pembayaranperpus->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif
                                        </td>
                                        <td>
                                            @if($bukti_pembayaranperpus)
                                                @if($bukti_pembayaranperpus->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_pembayaranperpus->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diupload</span> 
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Sumbangan Alumni</td>
                                        <td><input type="file" class="form-control" name="bukti_sumbanganalumni" />
                                            File:
                                            @if($bukti_sumbanganalumni)
                                                <a href="{{ asset('storage/'.$bukti_sumbanganalumni->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_sumbanganalumni)
                                                @if($bukti_sumbanganalumni->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_sumbanganalumni->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diupload</span> 
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Bukti Pas Foto 3x4</td>
                                        <td>
                                            <input type="file" class="form-control" name="bukti_fototigaempat" />
                                            File:
                                            @if($bukti_fototigaempat)
                                                <a href="{{ asset('storage/'.$bukti_fototigaempat->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_fototigaempat)
                                                @if($bukti_fototigaempat->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_fototigaempat->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diupload</span> 
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Bukti Pas Foto 2x3</td>
                                        <td><input type="file" class="form-control" name="bukti_fotoduatiga" />
                                            File:
                                            @if($bukti_fotoduatiga)
                                                <a href="{{ asset('storage/'.$bukti_fotoduatiga->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_fotoduatiga)
                                                @if($bukti_fotoduatiga->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_fotoduatiga->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diupload</span> 
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Bukti Pas Foto 4x6</td>
                                        <td><input type="file" class="form-control" name="bukti_empatenam" />
                                            File:
                                            @if($bukti_empatenam)
                                                <a href="{{ asset('storage/'.$bukti_empatenam->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_empatenam)
                                                @if($bukti_empatenam->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_empatenam->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diupload</span> 
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Bukti Pengumpulan Laporan TA</td>
                                        <td><input type="file" class="form-control" name="bukti_laporanta" />
                                            File:
                                            @if($bukti_laporanta)
                                                <a href="{{ asset('storage/'.$bukti_laporanta->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_laporanta)
                                                @if($bukti_laporanta->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_laporanta->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diupload</span> 
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Bukti Laporan PKN</td>
                                        <td>
                                            <input type="text" class="form-control" name="bukti_laporanpkn"
                                                value=""
                                                placeholder="Bukti Laporan TA" />
                                                File:
                                            @if($bukti_laporanpkn)
                                                <a href="{{ $bukti_laporanpkn->file }}" target="blank" >{{ $bukti_laporanpkn->file}}</a> 
                                            @else
                                               <span>Data Belum diinputkan</span> 
                                            @endif                                                
                                        </td>
                                        <td>
                                            @if($bukti_laporanpkn)
                                                @if($bukti_laporanpkn->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_laporanpkn->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diinputkan</span> 
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Bukti Link TA</td>
                                        <td><input type="text" class="form-control"
                                                value=""
                                                name="bukti_linkta" placeholder="Bukti Link TA" />
                                                File:
                                            @if($bukti_linkta)
                                                <a href="{{ $bukti_linkta->file }}" target="blank" >{{ $bukti_linkta->file }}</a> 
                                            @else
                                               <span>Data Belum diinputkan</span> 
                                            @endif                                                
                                        </td>
                                        <td>
                                            @if($bukti_linkta)
                                                @if($bukti_linkta->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_linkta->is_valid == 1)
                                                    <span class="label label-primary">Data Valid</span>
                                                @else
                                                    <span class="label label-danger">Data Tidak Valid</span>
                                                @endif
                                            @else
                                               <span class="label label-warning">Data Belum diinputkan</span> 
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    </div>
@endsection

