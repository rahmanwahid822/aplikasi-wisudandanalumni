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
                            DATA ALUMNI MAHASISWA
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
                                    <th>IPK</th>
                                    <th>Tahun Lulus</th>
                                    <th>Tempat Kerja</th>
                                    <th>Bidang Kerja</th>
                                    <th>Jabatan</th>
                                    <th>Tahun Kerja</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <td>{{ $user->nim }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->prodi }}</td>
                                        <td>{{ $user->angkatan }}</td>
                                        <td>{{ $user->ipk }}</td>
                                        <td>{{ $user->thn_lulus }}</td>
                                        <td>{{ $user->tmp_kerja }}</td>
                                        <td>{{ $user->bidang }}</td>
                                        <td>{{ $user->jabatan }}</td>
                                        <td>{{ $user->thn_mulai_kerja }}</td>
                                        <td>{{ $user->foto }}</td>
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
