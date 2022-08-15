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
                            DATA KELENGKAPAN FORMULIR YUDISIUM
                            <small>Atas nama <code> {{ auth()->user()->nama }}</code> </small>
                        </h2>
                    </div>
                    <div class="body">
                        <form class="form"
                            action = '/yudisium/{{ auth()->user()->id }}' 
                            {{-- action = '/yudisium'  --}}
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
                                        <td>Bukti Pengembalian Buku Perpustakaan</td>
                                        <td><input type="file" class="form-control" name="bukti_perpus" value="tes"/>
                                            File:
                                            @if($bukti_perpus)
                                                <a href="{{ asset('storage/'.$bukti_perpus->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif
                                        </td>
                                        <td>
                                            @if($bukti_perpus)
                                                @if($bukti_perpus->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_perpus->is_valid == 1)
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
                                        <td>Bukti Form Revisi</td>
                                        <td><input type="file" class="form-control" name="bukti_revisi" />
                                            File:
                                            @if($bukti_revisi)
                                                <a href="{{ asset('storage/'.$bukti_revisi->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif
                                        </td>
                                        <td>
                                            @if($bukti_revisi)
                                                @if($bukti_revisi->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_revisi->is_valid == 1)
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
                                        <td>Bukti Legalisir Ijazah</td>
                                        <td><input type="file" class="form-control" name="bukti_legalijazah" />
                                            File:
                                            @if($bukti_legalijazah)
                                                <a href="{{ asset('storage/'.$bukti_legalijazah->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_legalijazah)
                                                @if($bukti_legalijazah->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_legalijazah->is_valid == 1)
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
                                        <td>Bukti Legalisir Kartu Keluarga</td>
                                        <td>
                                            <input type="file" class="form-control" name="bukti_legalkk" />
                                            File:
                                            @if($bukti_legalkk)
                                                <a href="{{ asset('storage/'.$bukti_legalkk->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_legalkk)
                                                @if($bukti_legalkk->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_legalkk->is_valid == 1)
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
                                        <td>Bukti Akta Kelahiran</td>
                                        <td><input type="file" class="form-control" name="bukti_akta" />
                                            File:
                                            @if($bukti_akta)
                                                <a href="{{ asset('storage/'.$bukti_akta->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_akta)
                                                @if($bukti_akta->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_akta->is_valid == 1)
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
                                        <td>Bukti KHS smt 1 s/d 5</td>
                                        <td><input type="file" class="form-control" name="bukti_khs" />
                                            File:
                                            @if($bukti_khs)
                                                <a href="{{ asset('storage/'.$bukti_khs->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_khs)
                                                @if($bukti_khs->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_khs->is_valid == 1)
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
                                        <td>Bukti Pengumpulan Laporan PKN</td>
                                        <td><input type="file" class="form-control" name="bukti_pkn" />
                                            File:
                                            @if($bukti_pkn)
                                                <a href="{{ asset('storage/'.$bukti_pkn->file) }}" target="blank" >Lihat File</a> 
                                            @else
                                               <span>Data Belum diupload</span> 
                                            @endif                                            
                                        </td>
                                        <td>
                                            @if($bukti_pkn)
                                                @if($bukti_pkn->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_pkn->is_valid == 1)
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
                                        <td>Bukti Laporan TA</td>
                                        <td>
                                            <input type="text" class="form-control" name="bukti_ta"
                                                value=""
                                                placeholder="Bukti Laporan TA" />
                                                File:
                                            @if($bukti_ta)
                                                <a href="{{ $bukti_ta->file }}" target="blank" >{{ $bukti_ta->file }}</a> 
                                            @else
                                               <span>Data Belum diinputkan</span> 
                                            @endif                                                
                                        </td>
                                        <td>
                                            @if($bukti_ta)
                                                @if($bukti_ta->is_valid == 0)
                                                    <span class="label label-default">Belum Divalidasi</span>
                                                @elseif($bukti_ta->is_valid == 1)
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

