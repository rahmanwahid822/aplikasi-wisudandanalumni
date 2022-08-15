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
                    </div>
                    <div class="body table-responsive">
                        <form class="form"
                            action="/"
                            method="POST"
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
                                        </td>
                                        <td>Belum Valid</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Bukti Pembayaran Biaya Perpustakaan</td>
                                        <td><input type="file" class="form-control" name="bukti_pembayaranperpus" />
                                            File:
                                        </td>
                                        <td>Belum Valid</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Sumbangan Alumni</td>
                                        <td><input type="file" class="form-control" name="bukti_sumbanganalumni" />
                                            File:
                                        </td>
                                        <td>Belum Valid</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Bukti Pas Foto 3x4</td>
                                        <td>
                                            <input type="file" class="form-control" name="bukti_fototigaempat" />
                                            File:
                                        </td>
                                        <td>Belum Valid</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Bukti Pas Foto 2x3</td>
                                        <td><input type="file" class="form-control" name="bukti_fotoduatiga" />
                                            File:
                                        </td>
                                        <td>Belum Valid</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Bukti Pas Foto 4x6</td>
                                        <td><input type="file" class="form-control" name="bukti_empatenam" />
                                            File:
                                        </td>
                                        <td>Belum Valid</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Bukti Pengumpulan Laporan TA</td>
                                        <td><input type="file" class="form-control" name="bukti_laporanta" />
                                            File:
                                        </td>
                                        <td>Belum Valid</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Bukti Laporan PKN</td>
                                        <td><input type="text" class="form-control" name="bukti_laporanpkn"
                                                placeholder="Bukti Laporan PKN" />
                                                File:
                                        </td>
                                        <td>Belum Valid</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Bukti Link TA</td>
                                        <td><input type="text" class="form-control"
                                                value=""
                                                name="bukti_linkta" placeholder="Bukti Link TA" />
                                                File:
                                        </td>
                                        <td>Belum Valid</td>
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
