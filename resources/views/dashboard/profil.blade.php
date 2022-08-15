@extends('dashboard.layouts.main')

@section('isikonten')
@if (Session::get('success'))
    <div class="alert alert-success">
        {{ \Session::get('success') }}
    </div>
@endif
<div class="container-fluid">
            <div class="block-header">
                <h2>{{ $judul }}</h2>
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="upload/profil_img/{{ $data[0]->foto }}" alt="AdminBSB - Profile Image" width="250px" />
                            </div>
                            <div class="content-area">
                             @foreach ($data as $isi)
                                <h3>{{ $isi->nama }}</h3>
                                <p>{{ $isi->prodi }} ({{ $isi->angkatan }})</p>
                                <p>{{$isi->nim}}</p>

                                <p>{{$isi->email}}</p>
                                
                                
                            </div>
                            
                            @endforeach
                        </div>
                        <!-- <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Followers</span>
                                    <span>1.234</span>
                                </li>
                                <li>
                                    <span>Following</span>
                                    <span>1.201</span>
                                </li>
                                <li>
                                    <span>Friends</span>
                                    <span>14.252</span>
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-lg waves-effect btn-block">EDIT</button>
                        </div> -->
                    </div>

                
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <!-- <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li> -->
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        {{-- <form class="form-horizontal">
                                            @foreach($data as $isi)
                                            <div class="form-group">
                                                <label for="Nama" class="col-sm-2 control-label">Nama </label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label > {{ $isi->nama }}</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="nim" class="col-sm-2 control-label">NIM</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label > {{ $isi->nim }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik" class="col-sm-2 control-label">NIK</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label > {{ $isi->nik }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempatlahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label > {{ $isi->tmp_lahir }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggallahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label > {{ $isi->tgl_lahir }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label > {{ $isi->alamat }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jeniskelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label > {{ $isi->jns_kelamin}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jeniskelamin" class="col-sm-2 control-label">Ayah / Ibu</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label > {{ $isi->ayah}} / {{ $isi->ibu }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jeniskelamin" class="col-sm-2 control-label">No Hp</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <label >081717313733</label>
                                                    </div>
                                                </div>
                                            </div>
                                          @endforeach
                                        </form> --}}
                                        <form class="form-horizontal" action="/profile/{{ auth()->user()->id }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            @foreach($data as $isi)
                                            <div class="form-group">
                                                <label for="Nama" class="col-sm-2 control-label">Nama </label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value  ="{{ $isi->nama }}" name="nama" id="nama" >
                                                       
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="nim" class="col-sm-2 control-label">NIM</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->nim }}" name="nim" id="nim" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik" class="col-sm-2 control-label">NIK</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->nik }}" name="nik" id="nik" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tmp_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->tmp_lahir }}"name="tmp_lahir" id="tmp_lahir" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="date" class="form-control" value  ="{{ $isi->tgl_lahir }}" name="tgl_lahir" id="tgl_lahir" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->alamat }}" name="alamat" id="alamat" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ayah" class="col-sm-2 control-label">Nama Ayah</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->ayah }}" name="ayah" id="ayah" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ibu" class="col-sm-2 control-label">Nama Ibu</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->ibu}}" name="ibu" id="ibu" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jeniskelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->jns_kelamin }}" name="jns_kelamin" id="jeniskelamin" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jeniskelamin" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->email }}" name="email" id="email" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="no_hp" class="col-sm-2 control-label">No Hp</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" value  ="{{ $isi->no_hp }}" name="no_hp" id="no_hp" >
                                                    </div>
                                                </div>
                                            </div>
                                          
                                          <div class="form-group">
                                                
                                            </div><div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons">save</i>SUBMIT</button>
                                                </div>
                                            </div>

                                            @endforeach
                                        </form>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        

            
</div>

@endsection