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
                            VALIDASI DATA YUDISIUM {{ $nama }}
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
                                        <td>Bukti Pengembalian Buku Perpustakaan</td>
                                        <td>
                                            @if ($bukti_perpus)
                                                @if ($bukti_perpus->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_perpus->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_perpus ? $bukti_perpus->keterangan : '' }}</td>
                                        <td>{{  $bukti_perpus ? $bukti_perpus->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_perpus)
                                            <a href="{{ asset('storage/'.$bukti_perpus->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_perpus->is_valid == 0)
                                            <form action="/yudisium/is_valid/{{ $bukti_perpus->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_perpus">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Bukti Form Revisi</td>
                                        <td>
                                            @if ($bukti_revisi)
                                                @if ($bukti_revisi->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_revisi->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_revisi ? $bukti_revisi->keterangan : '' }}</td>
                                        <td>{{  $bukti_revisi ? $bukti_revisi->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_revisi)
                                            <a href="{{ asset('storage/'.$bukti_revisi->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_revisi->is_valid == 0)
                                            <form action="/yudisium/is_valid/{{ $bukti_revisi->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_revisi">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Bukti Legalisir Ijazah</td>
                                        <td>
                                            @if ($bukti_legalijazah)
                                                @if ($bukti_legalijazah->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_legalijazah->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_legalijazah ? $bukti_legalijazah->keterangan : '' }}</td>
                                        <td>{{  $bukti_legalijazah ? $bukti_legalijazah->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_legalijazah)
                                            <a href="{{ asset('storage/'.$bukti_legalijazah->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_legalijazah->is_valid == 0)
                                            <form action="/yudisium/is_valid/{{ $bukti_legalijazah->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_legalijazah">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Bukti Legalisir Kartu Keluarga</td>
                                        <td>
                                            @if ($bukti_legalkk)
                                                @if ($bukti_legalkk->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_legalkk->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_legalkk ? $bukti_legalkk->keterangan : '' }}</td>
                                        <td>{{  $bukti_legalkk ? $bukti_legalkk->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_legalkk)
                                            <a href="{{ asset('storage/'.$bukti_legalkk->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_legalkk->is_valid == 0)
                                            <form action="/yudisium/is_valid/{{ $bukti_legalkk->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_legalkk">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Bukti Akta Kelahiran</td>
                                        <td>
                                            @if ($bukti_akta)
                                                @if ($bukti_akta->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_akta->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_akta ? $bukti_akta->keterangan : '' }}</td>
                                        <td>{{  $bukti_akta ? $bukti_akta->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_akta)
                                            <a href="{{ asset('storage/'.$bukti_akta->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_akta->is_valid == 0)
                                            <form action="/yudisium/is_valid/{{ $bukti_akta->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_akta">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Bukti KHS smt 1 s/d 5</td>
                                        <td>
                                            @if ($bukti_khs)
                                                @if ($bukti_khs->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_khs->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_khs ? $bukti_khs->keterangan : '' }}</td>
                                        <td>{{  $bukti_khs ? $bukti_khs->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_khs)
                                            <a href="{{ asset('storage/'.$bukti_khs->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_khs->is_valid == 0)
                                            <form action="/yudisium/is_valid/{{ $bukti_khs->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_khs">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Bukti Pengumpulan Laporan PKN</td>
                                        <td>
                                            @if ($bukti_pkn)
                                                @if ($bukti_pkn->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_pkn->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_pkn ? $bukti_pkn->keterangan : '' }}</td>
                                        <td>{{  $bukti_pkn ? $bukti_pkn->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_pkn)
                                            <a href="{{ asset('storage/'.$bukti_pkn->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_pkn->is_valid == 0)
                                            <form action="/yudisium/is_valid/{{ $bukti_pkn->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_pkn">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                                <span>Tolak</span>
                                            </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Bukti Laporan TA</td>
                                        <td>
                                            @if ($bukti_ta)
                                                @if ($bukti_ta->is_valid == 0)
                                                    <span class="label label-danger">Belum Divalidasi</span>
                                                @elseif ($bukti_ta->is_valid == 1)
                                                    <span class="label label-danger">Tervalidasi</span>
                                                @else
                                                    <span class="label label-warning">Tidak Valid</span>
                                                @endif
                                            @else
                                                <span>Belum Diupload</span>
                                            @endif    
                                        </td>
                                        <td>{{ $bukti_ta ? $bukti_ta->keterangan : '' }}</td>
                                        <td>{{  $bukti_ta ? $bukti_ta->created_at : '' }}</td>
                                        <td>
                                            @if($bukti_ta)
                                            <a href="{{ asset('storage/'.$bukti_ta->file) }}" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
                                                <span>Lihat File</span>
                                            </a>
                                            @if($bukti_ta->is_valid == 0)
                                            <form action="/yudisium/is_valid/{{ $bukti_ta->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_ta">
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
                                            <form action="/yudisium/is_valid/{{ $bukti_linkta->id }}/1" method="POST" style="display: inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                                    <span>Konfirmasi</span>
                                                </button>
                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg" id="bukti_linkta">
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
        @if($bukti_perpus)
        $('#bukti_perpus').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_perpus->id }}/2');
        });
        @endif
        @if($bukti_revisi)
        $('#bukti_revisi').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_revisi->id }}/2');
        });
        @endif
        @if($bukti_legalijazah)
        $('#bukti_legalijazah').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_legalijazah->id }}/2');
        });
        @endif
        @if($bukti_legalkk)
        $('#bukti_legalkk').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_legalkk->id }}/2');
        });
        @endif
        @if($bukti_khs)
        $('#bukti_khs').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_khs->id }}/2');
        });
        @endif
        @if($bukti_pkn)
        $('#bukti_pkn').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_pkn->id }}/2');
        });
        @endif
        @if($bukti_ta)
        $('#bukti_ta').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_ta->id }}/2');
        });
        @endif
        @if($bukti_akta)
        $('#bukti_akta').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_akta->id }}/2');
        });
        @endif
        @if($bukti_linkta)
        $('#bukti_linkta').on('click', function() {
            $('#form_modal').attr('action', '');
            $('#form_modal').attr('action','/yudisium/is_valid/{{ $bukti_linkta->id }}/2');
        });
        @endif
    </script>
@endsection
