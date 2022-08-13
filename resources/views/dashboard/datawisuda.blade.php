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
                            DATA KELENGKAPAN FORMULIR WISUDA
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
                        @if (auth()->user()->datawisuda != null)
                            <form class="form"
                                action="{{ route('datawisuda.update', auth()->user()->datawisuda->id) }}" method="POST"
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
                                            <td>Bukti Pembayaran Biaya Ijazah & Wisuda</td>
                                            <td><input type="file" class="form-control" name="bukti_lunasijazahwisuda" />
                                                File:
                                                @if (auth()->user()->datawisuda->bukti_lunasijazahwisuda != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datawisuda->bukti_lunasijazahwisuda) }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_lunasijazahwisuda }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Bukti Pembayaran Biaya Perpustakaan</td>
                                            <td><input type="file" class="form-control" name="bukti_pembayaranperpus" />
                                                File:
                                                @if (auth()->user()->datawisuda->bukti_pembayaranperpus != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datawisuda->bukti_pembayaranperpus) }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_pembayaranperpus }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Sumbangan Alumni</td>
                                            <td><input type="file" class="form-control" name="bukti_sumbanganalumni" />
                                                File:
                                                @if (auth()->user()->datawisuda->bukti_sumbanganalumni != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datawisuda->bukti_sumbanganalumni) }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_sumbanganalumni }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Bukti Pas Foto 3x4</td>
                                            <td>
                                                <input type="file" class="form-control" name="bukti_fototigaempat" />
                                                File:
                                                @if (auth()->user()->datawisuda->bukti_fototigaempat != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datawisuda->bukti_fototigaempat) }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_fototigaempat }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Bukti Pas Foto 2x3</td>
                                            <td><input type="file" class="form-control" name="bukti_fotoduatiga" />
                                                File:
                                                @if (auth()->user()->datawisuda->bukti_fotoduatiga != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datawisuda->bukti_fotoduatiga) }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_fotoduatiga }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Bukti Pas Foto 4x6</td>
                                            <td><input type="file" class="form-control" name="bukti_empatenam" />
                                                File:
                                                @if (auth()->user()->datawisuda->bukti_empatenam != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datawisuda->bukti_empatenam) }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_empatenam }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Bukti Pengumpulan Laporan TA</td>
                                            <td><input type="file" class="form-control" name="bukti_laporanta" />
                                                File:
                                                @if (auth()->user()->datawisuda->bukti_laporanta != null)
                                                    <a href="{{ asset('storage/' . auth()->user()->datawisuda->bukti_laporanta) }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_laporanta }}</a>
                                                @else
                                                    Belum ada data
                                                @endif
                                            </td>
                                            <td>Belum Valid</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>Bukti Laporan PKN</td>
                                            <td><input type="text" class="form-control" name="bukti_laporanpkn"
                                                    value="{{ auth()->user()->datawisuda->bukti_laporanpkn ? auth()->user()->datawisuda->bukti_laporanpkn : '' }}"
                                                    placeholder="Bukti Laporan PKN" />
                                                    File:
                                                @if (auth()->user()->datawisuda->bukti_laporanpkn != null)
                                                    <a href="http://{{ auth()->user()->datawisuda->bukti_laporanpkn ? auth()->user()->datawisuda->bukti_laporanpkn : '' }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_laporanpkn }}</a>
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
                                                    value="{{ auth()->user()->datawisuda->bukti_linkta ? auth()->user()->datawisuda->bukti_linkta : '' }}"
                                                    name="bukti_linkta" placeholder="Bukti Link TA" />
                                                    File:
                                                @if (auth()->user()->datawisuda->bukti_linkta != null)
                                                    <a href="http://{{ auth()->user()->datawisuda->bukti_linkta ? auth()->user()->datawisuda->bukti_linkta : '' }}"
                                                        target="_blank">{{ auth()->user()->datawisuda->bukti_linkta }}</a>
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
                            <form class="form" action="{{ route('datawisuda.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    Belum ada data
                                    <br>
                                    <button class="btn btn-primary">Buat Form Wisuda</button>
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
