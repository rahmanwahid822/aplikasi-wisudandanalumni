@extends('dashboard.layouts.main')
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
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
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
                        @if (auth()->user()->datayudisium != null)
                            <form class="form"
                                action="{{ route('datayudisium.update', auth()->user()->datayudisium->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered">
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
                                            <td><input type="file" class="form-control" name="bukti_perpus" />
                                                File:
                                                @if (auth()->user()->datayudisium->bukti_perpus != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datayudisium->bukti_perpus) }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_perpus }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Bukti Form Revisi</td>
                                            <td><input type="file" class="form-control" name="bukti_revisi" />
                                                File:
                                                @if (auth()->user()->datayudisium->bukti_revisi != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datayudisium->bukti_revisi) }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_revisi }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Bukti Legalisir Ijazah</td>
                                            <td><input type="file" class="form-control" name="bukti_legalijazah" />
                                                File:
                                                @if (auth()->user()->datayudisium->bukti_legalijazah != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datayudisium->bukti_legalijazah) }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_legalijazah }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Bukti Legalisir Kartu Keluarga</td>
                                            <td>
                                                <input type="file" class="form-control" name="bukti_legalkk" />
                                                File:
                                                @if (auth()->user()->datayudisium->bukti_legalkk != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datayudisium->bukti_legalkk) }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_legalkk }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Bukti Akta Kelahiran</td>
                                            <td><input type="file" class="form-control" name="bukti_akta" />
                                                File:
                                                @if (auth()->user()->datayudisium->bukti_akta != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datayudisium->bukti_akta) }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_akta }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Bukti KHS smt 1 s/d 5</td>
                                            <td><input type="file" class="form-control" name="bukti_khs" />
                                                File:
                                                @if (auth()->user()->datayudisium->bukti_khs != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datayudisium->bukti_khs) }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_khs }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Bukti Pengumpulan Laporan PKN</td>
                                            <td><input type="file" class="form-control" name="bukti_pkn" />
                                                File:
                                                @if (auth()->user()->datayudisium->bukti_pkn != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datayudisium->bukti_pkn) }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_pkn }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>Bukti Laporan TA</td>
                                            <td><input type="text" class="form-control" name="bukti_ta"
                                                    value="{{ auth()->user()->datayudisium->bukti_ta ? auth()->user()->datayudisium->bukti_ta : '' }}"
                                                    placeholder="Bukti Laporan TA" />
                                                    File:
                                                @if (auth()->user()->datayudisium->bukti_ta != null)
                                                    <a href="http://{{ auth()->user()->datayudisium->bukti_ta ? auth()->user()->datayudisium->bukti_ta : '' }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_ta }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td>Bukti Link TA</td>
                                            <td><input type="text" class="form-control"
                                                    value="{{ auth()->user()->datayudisium->bukti_linkta ? auth()->user()->datayudisium->bukti_linkta : '' }}"
                                                    name="bukti_linkta" placeholder="Bukti Link TA" />
                                                    File:
                                                @if (auth()->user()->datayudisium->bukti_linkta != null)
                                                    <a href="http://{{ auth()->user()->datayudisium->bukti_linkta ? auth()->user()->datayudisium->bukti_linkta : '' }}"
                                                        target="_blank">{{ auth()->user()->datayudisium->bukti_linkta }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        @else
                            <form class="form" action="{{ route('datayudisium.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    Belum ada data
                                    <br>
                                    <button class="btn btn-primary">Buat Form Yudisium</button>
                                </table>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    </div>
@endsection
