@extends("layouts.master")
@section('title', 'JPS | Tambah lowker')
@section('content')
<div class="banner_1">
</div> 
<div class="container">
    <div class="single">  
       <div class="form-container">

        @if (session('terdaftar'))
        <div class="alert alert-success">
            <p>{{session('terdaftar')}}</p>
        </div>
        @endif

        <h2>Create Job</h2>
        <form action="/lowker/tambah-lowker" method="post">
            @php
                $info = array('Title', 'Institution Name', 'Job Category', 'Requirements', 'Validity Period', 'Salary/ Month', 'Deadline for Apply', 'Address', 'Contact');
                $name = array('judul', 'nama_lembaga', 'kategori', 'syarat', 'masa_berlaku', 'gaji', 'deadline', 'alamat', 'kontak');
            @endphp

            @for($i = 0; $i < count($info); $i++)
                <div class="row">
                    <div class='form-group col-md-12 {{ $errors->has("$name[$i]") ? " has-error" : "" }}'>
                        <label class="col-md-3 control-lable" for="judul">{{ $info[$i] }}</label>

                        <div class="col-md-9">
                            <input id="{{ $name[$i] }}" type="text" class="form-control" name="{{ $name[$i] }}" value='{{ old("$name[$i]") }}' placeholder="{{ $name[$i] == 'deadline' ? 'ex : 2017-12-08' : '' }} ">
                            @if ($errors->has("$name[$i]"))
                                <span class="help-block">
                                    <strong>{{ $errors->first($name[$i]) }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endfor
            <div class="row">
                <div class='form-group col-md-12 {{ $errors->has("deskripsi") ? " has-error" : "" }}'>
                    <label class="col-md-3 control-lable" for="description">Description</label>
                    <div class="col-md-9 sm_1">
                        <textarea cols="77" rows="6" onfocus="this.value='';" onblur="if (this.value == '') {this.value = '';}" name="deskripsi" class="form-control">{{ old("deskripsi") }}</textarea>
                        @if ($errors->has("deskripsi"))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-actions floatRight">
                    <input type="submit" value="Tambah Lowongan" class="btn btn-primary btn-sm">
                </div>
            </div>
        </form>
    </div>
 </div>
</div>
@endsection