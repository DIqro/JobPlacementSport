<!-- Modal Validasi Lowker-->
  <div class="modal fade" id="modalValidasi{{$dt->id_lowker}}" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
          <br><p id='message'>Anda yakin ingin MENYETUJUI lowker ini?</p>
            <form action="{{ url('/admin/terima-lowker') }}" method="post"> 
              <input type="hidden" name="id_lowker" value="{{ $dt->id_lowker }}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm">Ya</button>
            </form>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>  


<!-- Modal NonValidasi Lowker-->
  <div class="modal fade" id="modalNonValidasi{{$dt->id_lowker}}" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
          <br><p id='message'>Anda yakin TIDAK MENYETUJUI Lowker ini?</p>
            <form action="{{ url('/admin/tolak-lowker') }}" method="post"> 
              <input type="hidden" name="id_lowker" value="{{ $dt->id_lowker }}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm">Ya</button>
            </form>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div> 

<!-- Modal Edit Lowker-->
  <div class="modal fade" id="modalEdit{{ $dt->id_lowker }}" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"> 
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Lowongan Kerja</h4>
	    </div>
        <div class="modal-body">
          <form action="{{ url('admin/edit-lowker') }}" method="post" class="form-group">

          <div class="form-group">
            <label for="id_lowker" class="col-md-3 control-label">ID Lowker</label>
            <div class="col-md-9">
                <input id="id_lowker" type="text" class="form-control" name="id_lowker" value="{{ $dt->id_lowker }}" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="pemilik" class="col-md-3 control-label">Pemilik</label>
            <div class="col-md-9">
                <input id="pemilik" type="text" class="form-control" name="pemilik" value="{{ $dt->nama }}" readonly>
            </div>
          </div>

          @php
            $info = array('Judul', 'Nama Lembaga', 'Kategori', 'Syarat', 'Masa Berlaku', 'Gaji', 'Deadline', 'Alamat', 'Kontak', 'Deskripsi');
            $kolom = array('judul', 'nama_lembaga', 'kategori', 'syarat', 'masa_berlaku', 'gaji', 'deadline', 'alamat', 'kontak', 'deskripsi');
          @endphp
          
          @for($i = 0; $i < count($info); $i++)
            <div class='form-group{{ $errors->has("$kolom[$i]") ? " has-error" : "" }}'>
              <label for="{{ $kolom[$i] }}" class="col-md-3 control-label">{{ $info[$i] }}</label>
              <div class="col-md-9">
                  <input id="{{ $kolom[$i] }}" type="text" class="form-control" name="{{ $kolom[$i] }}" value="{{ $dt->$kolom[$i] }}"><span class="help-block">{{ $errors->first("$kolom[$i]") }}</span>
              </div>
            </div>
          @endfor

          <label class="col-md-3 control-label" for="status">Status</label>
          <div class="col-md-9">
            <select class="form-control" id="status" name="status">
              <option value="valid">Valid</option>
              <option value="invalid">Invalid</option>
              <option value="ditolak">Di Tolak</option>
            </select>
          </div>

          <div class="form-group">
            <label for="tgl_post" class="col-md-3 control-label">Dipost sejak</label>
            <div class="col-md-9">
                <input id="tgl_post" type="text" class="form-control" name="tgl_post" value="{{ $dt->tgl_post }}" readonly>
            </div>
          </div>

		  		<div class="row"></div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm">Edit</button>
            </form>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

 <!-- Modal Hapus Lowker-->
  <div class="modal fade" id="modalDelete{{ $dt->id_lowker }}" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
          <br><p>Anda yakin ingin MENGHAPUS Lowker ini?</p>
            <form action="{{ URL('/admin/hapus-lowker') }}" method="post"> 
              <input type="hidden" name="id_lowker" value="{{ $dt->id_lowker }}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm">Hapus</button>
            </form>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Edit Member-->
  <div class="modal fade" id="modalEditAkun{{ $dt->id }}" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Pengguna</h4>
      </div>
        <div class="modal-body">
          <form action='{{ url("admin/edit-pegguna") }}' method="post" class="form-group">

          <div class="form-group">
            <label for="id_lowker" class="col-md-3 control-label">ID Pengguna</label>
            <div class="col-md-9">
                <input id="id_pengguna" type="text" class="form-control" name="id_pengguna" value="{{ $dt->id }}" readonly>
            </div>
          </div>
          <span class="help-block"></span>
          <input id="real_email" type="hidden" name="real_email" value="{{ $dt->email }}" readonly>
          @php
            $info = array('Nama', 'Email', 'Alamat', 'Tanggal Lahir');
            $kolom = array('nama', 'email', 'alamat', 'tgl_lahir');
          @endphp
          
          @for($i = 0; $i < count($info); $i++)
            <div class='form-group{{ $errors->has("$kolom[$i]") ? " has-error" : "" }}'>
              <label for="{{ $kolom[$i] }}" class="col-md-3 control-label">{{ $info[$i] }}</label>
              <div class="col-md-9">
                  <input id="{{ $kolom[$i] }}" type="text" class="form-control" name="{{ $kolom[$i] }}" value="{{ $dt->$kolom[$i] }}"><span class="help-block">{{ $errors->first("$kolom[$i]") }}</span>
              </div>
            </div>
          @endfor

          <div class="row"></div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm" >Edit</button>
            </form>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

 <!-- Modal Hapus Member-->
  <div class="modal fade" id="modalDeleteAkun{{ $dt->id }}" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
          <br><p>Anda yakin ingin menghapus pengguna ini?</p>
            <form action='{{ URL("/admin/hapus-pengguna") }}' method="post"> 
              <input type="hidden" name="id_member" value="{{ $dt->id }}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm">Hapus</button>
            </form>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>