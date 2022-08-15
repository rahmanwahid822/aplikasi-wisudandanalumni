@extends('dashboard.layouts.main')
@section('css')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css" rel="stylesheet">
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

        <div class="row clearfix">
            <div class="col-12 card bg-warning">
                    <div class="header" style="background-color: #00AA9E;">
                        <h2>
                            DATA KELENGKAPAN FORMULIR WISUDA MAHASISWA
                        </h2>
                    </div>
                    <div class="body">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Angkatan</th>
                                    <th>Status Mahasiswa</th>
                                    <th>Status File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->nim }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->prodi }}</td>
                                        <td>{{ $user->angkatan }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <span class="label label-primary">{{ $user->tervalidasi }} Tervalidasi</span>
                                            <span class="label label-danger">{{ $user->belum_valid }} Belum Divalidasi</span>
                                            <span class="label label-warning">{{ $user->belum_upload }} Belum Diupload</span>
                                        </td>
                                        <td>
                                            <a href="/wisuda/validation/{{ $user->id }}" class="btn btn-primary btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    </script>
@endsection
