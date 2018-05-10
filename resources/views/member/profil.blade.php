@extends("layouts.master")
@section('title', 'JPS | Profilku')
@section("content")
<script type="text/javascript">
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>
<br>
<div class="container-fluid">
    <div class="row content" >
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="background-color: #edf0f2; border-radius: 10px;">
              
        @if(count($errors) > 0)
            <div class="alert alert-danger alert-dismissable">
                <a href="#" aria-label="close" class="close" data-dismiss="alert">&times;</a>
                <strong>Perubahan data gagal. Terdapat kesalahan</strong> 
            </div>
        @endif 
        @if(session('notif'))
            @if(session('key') == 'sukses')
               <div class="alert alert-success alert-dismissable">
            @else
                <div class="alert alert-danger alert-dismissable">
            @endif
                    <a href="#" aria-label="close" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{ session('notif') }}</strong> 
                </div>
        @endif

            <ul class="nav nav-tabs" id='myTab'>
                <li class="active"><a data-toggle="tab" href="#profil">Profil</a></li>
                <li><a data-toggle="tab" href="#edit">Edit Profil</a></li>
                <li><a data-toggle="tab" href="#my_lowker">Lowker-ku</a></li>
                <li><a data-toggle="tab" href="#my_cv">CV-ku</a></li>
            </ul>

        <div class="well">
            <div class="tab-content" style="padding-top: 20px;">
                <div id="profil" class="tab-pane fade in active">
                    <div class="row content">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="row content">
                                @php $foto = asset("members/default.jpg"); @endphp
                                @if(file_exists(public_path("members/$member->id/$member->id.jpg")))
                                    @php $foto = asset("members/$member->id/$member->id.jpg"); @endphp
                                @endif
                                @php $hover = asset("members/change.jpg"); @endphp
                                <label for="FileInput">
                                    <img src='{{ $foto }}' style="cursor:pointer; width: 100%;" onmouseover="this.src='{{ $hover }}'"onmouseout="this.src='{{ $foto }}'" title="Klik untuk mengganti foto profil">
                                </label>
                                <form enctype="multipart/form-data" method="POST", action="{{ url('update-foto') }}" class="form-horizontal">
                                    <input type="file" id="FileInput" name="foto" style="cursor: pointer; display: none">
                                    <input type="submit" id="Up" style="display: none;">
                                </form>
                            </div>

                        </div>
                        <div class="col-sm-4"></div>
                    </div><br>

                    @if ($errors->has('foto'))
                        <strong><p style="color: red" align="center" id='notif_error'>Gagal mengubah foto. {{ $errors->first('foto') }}</p></strong>
                    @endif

                    <div class="row content" style="margin-top: 10px;">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="well" align="center">
                                <p><strong>{{ $member->nama }}</strong></p>
                                <p><i class="fa fa-envelope-o" style="padding-right: 10px;"></i>{{ $member->email }}</p>
                                <p><i class="fa fa-home" style="padding-right: 10px;"></i>{{ $member->alamat }}</p>
                                <p><i class="fa fa-birthday-cake" style="padding-right: 10px;"></i>{{ $member->tgl_lahir }}</p>
                            </div>
                        </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>

        <div id="edit" class="tab-pane fade">
            <div class="row content">
                <form class="form-horizontal" method="POST" action="{{ url('update-profil') }}">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nama</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="nama" value="{{ $member->nama }}" >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $member->email }}" >

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                        <label for="alamat" class="col-md-4 control-label">Alamat</label>

                        <div class="col-md-6">
                            <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $member->alamat }}" >

                            @if ($errors->has('alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                        <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>

                        <div class="col-md-6">
                            <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ $member->tgl_lahir }}" placeholder="ex : 1998-11-02">

                            @if ($errors->has('tgl_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            
                            <button type="submit" class="btn btn-primary">
                                Ubah Profil
                            </button>
                        </div>
                    </div>
                </form>

                <form class="form-horizontal" method="POST" action="{{ url('update-pw') }}">
                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password Saat Ini</label>

                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control" name="current_password" >

                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">New Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="new_password" >

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Ubah Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="my_lowker" class="tab-pane fade">
            <div class="row content">
                @foreach($lowker as $dt)
                    @include('layouts.lowker', array('data' => $dt))
                @endforeach
            </div>
        </div>

        <div id="my_cv" class="tab-pane fade">
            <div class="row content">
                <form action="{{ url('update-cv') }}" method="POST" class="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-inline">
                        <label for="file_cv" class="col-md-3 control-label">File CV</label>
                        <input id="file_cv" type="file" class="form-control" name="file_cv">
                        <button type="submit" class="btn btn-primary"> Simpan</button>
                    </div>
                </form>
                <div class="form-group has-error" align="center">
                    <div class="col-md-12">
                        @if ($errors->has('file_cv'))
                            <span class="help-block">
                                <strong>{{ $errors->first('file_cv') }}</strong>
                            </span>
                        @endif
                    </div>
                </div><br><br>

                <table  class="table table-striped">
                    <thead style="background-color: #03a9f4">
                        <tr>
                          <th class="text-center">Dokumen</th>
                          <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">CV</td>
                            <td class="text-center">
                            @if(file_exists(public_path("members/$member->id/$member->id.pdf")))
                                <a class="btn-sm btn-success" href="{{ url('profil/my-cv') }}" target="_blank"><i class="fa fa-eye"></i> Preview</a>
                            @else
                                <p style="color: red">Anda belum upload CV</p>
                            @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
<script type="text/javascript">
    $( "#FileInput" ).change(function() {
      $( "#Up" ).click();
    });
</script>
@endsection