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
                            VALIDASI DATA WISUDA {{ $nama }}
                        </h2>
                    </div>
                    <div class="body">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Tgl. Upload</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Bukti Pembayaran Biaya Ijazah & Wisuda</td>
                                        <td>
                                            @if ($bukti_lunasijazahwisuda)
                                                @if ($bukti_lunasijazahwisuda->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_lunasijazahwisuda->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_lunasijazahwisuda ? $bukti_lunasijazahwisuda->keterangan : '' }}</td>
                                        <td>{{  $bukti_lunasijazahwisuda ? $bukti_lunasijazahwisuda->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_lunasijazahwisuda)
                                            <a href="{{ asset('storage/'.$bukti_lunasijazahwisuda->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_lunasijazahwisuda->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_lunasijazahwisuda->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_lunasijazahwisuda" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Bukti Pembayaran Biaya Perpustakaan</td>
                                        <td>
                                            @if ($bukti_pembayaranperpus)
                                                @if ($bukti_pembayaranperpus->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_pembayaranperpus->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_pembayaranperpus ? $bukti_pembayaranperpus->keterangan : '' }}</td>
                                        <td>{{  $bukti_pembayaranperpus ? $bukti_pembayaranperpus->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_pembayaranperpus)
                                            <a href="{{ asset('storage/'.$bukti_pembayaranperpus->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_pembayaranperpus->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_pembayaranperpus->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_pembayaranperpus" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Sumbangan Alumni</td>
                                        <td>
                                            @if ($bukti_sumbanganalumni)
                                                @if ($bukti_sumbanganalumni->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_sumbanganalumni->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_sumbanganalumni ? $bukti_sumbanganalumni->keterangan : '' }}</td>
                                        <td>{{  $bukti_sumbanganalumni ? $bukti_sumbanganalumni->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_sumbanganalumni)
                                            <a href="{{ asset('storage/'.$bukti_sumbanganalumni->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_sumbanganalumni->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_sumbanganalumni->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_sumbanganalumni" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Bukti Pas Foto 3x4</td>
                                        <td>
                                            @if ($bukti_fototigaempat)
                                                @if ($bukti_fototigaempat->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_fototigaempat->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_fototigaempat ? $bukti_fototigaempat->keterangan : '' }}</td>
                                        <td>{{  $bukti_fototigaempat ? $bukti_fototigaempat->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_fototigaempat)
                                            <a href="{{ asset('storage/'.$bukti_fototigaempat->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_fototigaempat->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_fototigaempat->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_fototigaempat" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Bukti Pas Foto 2x3</td>
                                        <td>
                                            @if ($bukti_fotoduatiga)
                                                @if ($bukti_fotoduatiga->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_fotoduatiga->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_fotoduatiga ? $bukti_fotoduatiga->keterangan : '' }}</td>
                                        <td>{{  $bukti_fotoduatiga ? $bukti_fotoduatiga->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_fotoduatiga)
                                            <a href="{{ asset('storage/'.$bukti_fotoduatiga->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_fotoduatiga->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_fotoduatiga->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_fotoduatiga" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Bukti Pas Foto 4x6</td>
                                        <td>
                                            @if ($bukti_empatenam)
                                                @if ($bukti_empatenam->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_empatenam->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_empatenam ? $bukti_empatenam->keterangan : '' }}</td>
                                        <td>{{  $bukti_empatenam ? $bukti_empatenam->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_empatenam)
                                            <a href="{{ asset('storage/'.$bukti_empatenam->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_empatenam->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_empatenam->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_empatenam" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Bukti Pengumpulan Laporan TA</td>
                                        <td>
                                            @if ($bukti_laporanta)
                                                @if ($bukti_laporanta->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_laporanta->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_laporanta ? $bukti_laporanta->keterangan : '' }}</td>
                                        <td>{{  $bukti_laporanta ? $bukti_laporanta->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_laporanta)
                                            <a href="{{ asset('storage/'.$bukti_laporanta->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_laporanta->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_laporanta->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_laporanta" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Bukti Laporan PKN</td>
                                        <td>
                                            @if ($bukti_laporanpkn)
                                                @if ($bukti_laporanpkn->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_laporanpkn->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_laporanpkn ? $bukti_laporanpkn->keterangan : '' }}</td>
                                        <td>{{  $bukti_laporanpkn ? $bukti_laporanpkn->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_laporanpkn)
                                            <a href="{{ asset('storage/'.$bukti_laporanpkn->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_laporanpkn->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_laporanpkn->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_laporanpkn" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Bukti Link TA</td>
                                        <td>
                                            @if ($bukti_linkta)
                                                @if ($bukti_linkta->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_linkta->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_linkta ? $bukti_linkta->keterangan : '' }}</td>
                                        <td>{{  $bukti_linkta ? $bukti_linkta->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_linkta)
                                            <a href="{{ asset('storage/'.$bukti_linkta->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_linkta->is_valid == 0)
                                            <form action="/wisuda/is_valid/{{ $bukti_linkta->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" id="bukti_linkta" data-target="#myModal" class="btn btn-danger btn-lg">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    
                            </tbody>
                        </table>
                    </div>
            </div>

        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alasan Penolakan</h4>
      </div>
    <form action="" method="POST" id="form_modal">
        @method('put')
        @csrf
        <div class="modal-body">
                <textarea class="form-control" name="keterangan" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
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
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
    </script>
    <script>
        @if($bukti_lunasijazahwisuda)
        $('#bukti_lunasijazahwisuda').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_lunasijazahwisuda->id }}/2');
        });
        @endif
        @if($bukti_pembayaranperpus)
        $('#bukti_pembayaranperpus').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_pembayaranperpus->id }}/2');
        });
        @endif
        @if($bukti_sumbanganalumni)
        $('#bukti_sumbanganalumni').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_sumbanganalumni->id }}/2');
        });
        @endif
        @if($bukti_fototigaempat)
        $('#bukti_fototigaempat').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_fototigaempat->id }}/2');
        });
        @endif
        @if($bukti_fotoduatiga)
        $('#bukti_fotoduatiga').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_fotoduatiga->id }}/2');
        });
        @endif
        @if($bukti_empatenam)
        $('#bukti_empatenam').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_empatenam->id }}/2');
        });
        @endif
        @if($bukti_laporanta)
        $('#bukti_laporanta').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_laporanta->id }}/2');
        });
        @endif
        @if($bukti_laporanpkn)
        $('#bukti_laporanpkn').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_laporanpkn->id }}/2');
        });
        @endif
        @if($bukti_linkta)
        $('#bukti_linkta').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/wisuda/is_valid/{{ $bukti_linkta->id }}/2');
        });
        @endif
    </script>
@endsection
