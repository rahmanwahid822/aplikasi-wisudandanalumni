@extends('dashboard.layouts.main')
@section('isikonten')


<div class="container-fluid">
            <div class="block-header">
                <h2>{{ $judul }}</h2>
            </div>
              <!-- Bordered Table -->
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        @foreach($data as $isi)
                            <h2>
                                DATA KELENGKAPAN FORMULIR YUDISIUM
                                <small>Atas nama <code> {{ $isi->user->nama}}</code> </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> NO</th>
                                        <th> URAIAN</th>
                                        <th> FILE UPLOAD </th>
                                        <th> STATUS VALIDASI </th>
                                        <th> AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                
                                
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Bukti Pengembalian Buku Perpustakaan</td>
                             
                                        <td>{{$isi->bukti_perpus}}</td>
                                
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Bukti Form Revisi</td>
                                        <td><input type="file" class="form-control" placeholder="Username" /></td>
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Bukti Legalisir Ijazah</td>
                                        <td><input type="file" class="form-control" placeholder="Username" /></td>
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Bukti Legalisir Kartu Keluarga</td>
                                        <td><input type="file" class="form-control" placeholder="Username" /></td>
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Bukti Akta Kelahiran</td>
                                        <td><input type="file" class="form-control" placeholder="Username" /></td>
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Bukti KHS smt 1 s/d 5</td>
                                        <td><input type="file" class="form-control" placeholder="Username" /></td>
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Bukti Pengumpulan Laporan PKN</td>
                                        <td><input type="file" class="form-control" placeholder="Username" /></td>
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Bukti Laporan TA</td>
                                        <td><input type="file" class="form-control" placeholder="Username" /></td>
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Bukti Link TA</td>
                                        <td><input type="file" class="form-control" placeholder="Username" /></td>
                                        <td>Belum Valid</td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                    @endforeach
                                                   </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            
       
            <!-- Input -->
            <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ISI KELENGKAPAN DATA YUDISIUM
                                @foreach($data as $isi)
                                <small>Nama : {{ $isi -> nama }}</small>
                                @endforeach
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Foto</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Basic Examples</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" placeholder="Username" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- #END# Input -->
            <!-- Textarea -->
            <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TEXTAREA</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Basic Example</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-inside-title">
                                Auto Growing Vertical Direction
                                <small>Taken from <a href="https://github.com/jackmoore/autosize/tree/master" target="_blank">github.com/jackmoore/autosize/tree/master</a></small>
                            </h2>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="1" class="form-control no-resize auto-growth" placeholder="Please type what you want... And please don't forget the ENTER key press multiple times :)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- #END# Textarea -->
        </div>
    </section>

        </div>

@endsection