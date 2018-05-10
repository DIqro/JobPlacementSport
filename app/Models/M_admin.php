<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_admin extends Model {
    protected $table = "admin";
    protected $primaryKey = "id_admin";
    public $timestamps = false;
    protected $fillable = ["nama", "email", "password", "remember_token"];
}





            // <!-- <form id="save-form" action='{{ url("lowker/$data->id") }}' method="POST" style="display: none;">
            //     <input type="submit" name="btn-save">
            // <!-- <a id="ref_fb" href="http://www.facebook.com/sharer.php?s=100&amp;p[title]={{ $data->judul }}&amp;p[summary]={{ $data->deskripsi }}&amp;p[url]={{ urlencode('127.0.0.1:8000/lowker/1') }}&amp; p[images][0]={{ public_path('members/default.jpg') }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600'); return false;">
            // <img src='{{ asset("members/default.jpg") }}' style="width:70px; height:70px" /></a> -->

                                        // <button class="btn-xs btn-success" type="submit"><span class="glyphicon glyphicon-ok"> Lolos</button>
                                        
                                        // <button class="btn-xs btn-danger" type="submit"><span class="glyphicon glyphicon-remove"> TidakLolos</button>


  //   <style>
  //   .row.content {height: 600px}
  //   .sidenav {
  //      border-radius: 10px;
  //     background-color: #f1f1f1;
  //     height: 100%;
  //   }
  //   @media screen and (max-width: 767px) {
  //     .sidenav {
  //       height: auto;
  //       padding: 15px;
  //     }
  //     .row.content {height: auto;} 
  //   }
  //   div.container {
  //       width: 90%;
  //   }
  // </style>


// protected $primaryKey = "id_pengguna";
//     const CREATED_AT = "tgl_daftar";
//     protected $fillable = ["nama", "email", "password", "nomor_hp", "jenis", "alamat"];

//     public function setUpdatedAt($value){ 
    	
//     }
//     public function getUpdatedAtColumn(){
    	
// 	}


                                    // <div class="col-md-5 padding-0">
                                    //     <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required>
                                    // </div>

                                    // <div class="col-md-5 padding-0">
                                    //     <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                                    // </div>

                                    // <div class="col-md-2">
                                    //     <button type="submit" class="btn btn-primary">
                                    //         Login
                                    //     </button>
                                    // </div>





                    // <style type="text/css">
                    //     .image-upload > input {
                    //         display: none;
                    //     }
                    // </style>
                    // <div class="image-upload">
                    //     <label for="file-input">
                    //         <img src='{{ asset("members/$member->id/$member->id.jpg") }}' style="width: 100%" title="Klik gambar untuk mengubah foto profil">
                    //     </label>
                    //     <input id="file-input" type="file"/>
                    // </div>


// <div class="col-sm-4"></div>
//                         <div class="col-sm-4">

//                     <label for="FileInput">
//                         <img src='{{ asset("members/default.jpg") }}' style="cursor:pointer; width: 100%;" onmouseover="this.src='{{ $path }}'"onmouseout="this.src='{{ $path2 }}'">
//                     </label>
//                     <form action="upload.php">
//                         <input type="file" id="FileInput" style="cursor: pointer; display: none"/>
//                         <input type="submit" id="Up" style="display: none;" />
//                     </form>

//                             <div class="row content">
//                                 @if(file_exists(public_path("members/$member->id/$member->id.jpg")))
//                                     <img src='{{ asset("members/$member->id/$member->id.jpg") }}' style="width: 100%">
//                                 @else
//                                     <img src='{{ asset("members/default.jpg") }}' style="width: 100%">
//                                 @endif
//                             </div>
//                         </div>
//                         <div class="col-sm-4"></div>
//                     </div><br>

//                     <form enctype="multipart/form-data" method="POST", action="{{ url('update-foto') }}" class="form-horizontal">
//                         <div class="form-group">
//                             <label for="foto" class="col-md-4 control-label">Ganti foto?</label>
//                             <div class="col-md-4">
//                                 <input type="file" name="foto" class="form-control">
//                             </div>
//                             <div class="col-md-1">
//                                 <button type="submit" class="btn btn-primary">
//                                     Ganti
//                                 </button>
//                             </div>
//                         </div>
//                     </form>




            // <div class="col-sm-3">
            //     <label>Judul</label> 
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->judul }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Nama</label> 
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->nama }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Nama Lembaga</label> 
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->nama_lembaga }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Kategori</label>
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->kategori }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Syarat</label>
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->syarat }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Masa berlaku</label> 
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->masa_berlaku }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Gaji</label>
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->gaji }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Deadline</label>
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->deadline }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Alamat</label> 
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->alamat }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Kontak</label>
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->kontak }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Deskripsi</label>
            // </div>
            // <div class="col-sm-8">
            //     <p>{{ $data->deskripsi }}</p>
            // </div>

            // <div class="col-sm-3">
            //     <label>Dipost sejak</label>
            // </div>
            // <div class="col-sm-8">
            //     <p>Posted by <i>{{ $data->nama }}</i> on {{ $data->tgl_post }}</p>
            // </div>
