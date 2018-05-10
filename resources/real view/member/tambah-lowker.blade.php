@extends('layouts.master')
@section('title', 'JPS | Tambah lowker')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            @if(session('notif'))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" aria-label="close" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{ session('notif') }}</strong> 
                </div>
            @endif
            @if(session('terdaftar'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" aria-label="close" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{ session('terdaftar') }}</strong> 
                </div>
            @endif
            
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Tambah Lowongan Pekerjaan baru</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('lowker/tambah-lowker') }}">
                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="judul" class="col-md-4 control-label">Judul</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" >

                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_lembaga') ? ' has-error' : '' }}">
                            <label for="nama_lembaga" class="col-md-4 control-label">Nama Lembaga</label>

                            <div class="col-md-6">
                                <input id="nama_lembaga" type="text" class="form-control" name="nama_lembaga" value="{{ old('nama_lembaga') }}" >

                                @if ($errors->has('nama_lembaga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_lembaga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('syarat') ? ' has-error' : '' }}">
                            <label for="syarat" class="col-md-4 control-label">Syarat dan Ketentuan</label>

                            <div class="col-md-6">
                                <input id="syarat" type="text" class="form-control" name="syarat" value="{{ old('syarat') }}" >

                                @if ($errors->has('syarat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('syarat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('masa_berlaku') ? ' has-error' : '' }}">
                            <label for="masa_berlaku" class="col-md-4 control-label">Masa Berlaku</label>

                            <div class="col-md-6">
                                <input id="masa_berlaku" type="text" class="form-control" name="masa_berlaku" value="{{ old('masa_berlaku') }}" >

                                @if ($errors->has('masa_berlaku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('masa_berlaku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gaji') ? ' has-error' : '' }}">
                            <label for="gaji" class="col-md-4 control-label">Gaji/bulan</label>

                            <div class="col-md-6">
                                <input id="gaji" type="text" class="form-control" name="gaji" value="{{ old('gaji') }}" >

                                @if ($errors->has('gaji'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gaji') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
                            <label for="deadline" class="col-md-4 control-label">Deadline pengumpulan berkas</label>

                            <div class="col-md-6">
                                <input id="deadline" type="text" class="form-control" name="deadline" value="{{ old('deadline') }}" placeholder="ex : 2017-11-07">

                                @if ($errors->has('deadline'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deadline') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat Lembaga</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" >

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kontak') ? ' has-error' : '' }}">
                            <label for="kontak" class="col-md-4 control-label">Kontak Lembaga</label>

                            <div class="col-md-6">
                                <input id="kontak" type="text" class="form-control" name="kontak" value="{{ old('kontak') }}" >

                                @if ($errors->has('kontak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kontak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                            <label for="kategori" class="col-md-4 control-label">Kategori Pekerjaan</label>

                            <div class="col-md-6">
                                <input id="kategori" type="text" class="form-control" name="kategori" value="{{ old('kategori') }}" >

                                @if ($errors->has('kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea id="deskripsi" type="text" class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>

                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="btn_tambah">
                                    Tambah Lowongan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection