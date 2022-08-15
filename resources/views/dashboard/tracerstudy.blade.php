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
                            DATA TRACER STUDY
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
                        <form class="form"
                            action="/tracerstudy" method="POST" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> NO</th>
                                        <th> URAIAN</th>
                                        <th> ISI DATA </th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>IPK</td>
                                        <td>
                                            <input type="text" class="form-control" name="ipk"
                                                value="{{ $data ? $data->ipk : '' }}"
                                                placeholder="IPK"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>TAHUN LULUS</td>
                                        <td><input type="text" class="form-control"
                                                value="{{ $data ? $data->thn_lulus : '' }}"
                                                name="thn_lulus" placeholder="Tahun Lulus Kuliah" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>TEMPAT KERJA</td>
                                        <td><input type="text" class="form-control"
                                                value="{{ $data ? $data->tmp_kerja : '' }}"
                                                name="tmp_kerja" placeholder="Tempat Kerja" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>BIDANG KERJA</td>
                                        <td><input type="text" class="form-control"
                                                value="{{ $data ? $data->bidang : '' }}"
                                                name="bidang" placeholder="Bidang Kerja" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>JABATAN KERJA</td>
                                        <td><input type="text" class="form-control"
                                                value="{{ $data ? $data->jabatan : '' }}"
                                                name="jabatan" placeholder="Jabatan Kerja" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>TAHUN MULAI BEKERJA</td>
                                        <td><input type="text" class="form-control"
                                                value="{{ $data ? $data->thn_mulai_kerja : '' }}"
                                                name="thn_mulai_kerja" placeholder="Tahun Mulai Bekerja" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>FOTO KERJA</td>
                                        <td><input type="file" class="form-control"
                                                value=""
                                                name="fotokerja" placeholder="FOTO KERJA" />
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
