@extends("admin.menu-admin")
@section('title', 'JPS | Validasi Lowker')
@section("content-admin")

  <div class="container">
    <h2>Tabel Validasi Lowongan Pekerjaan</h2>                
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Judul Lowker</th>
          <th>Pemilik</th>
          <th>Deadline Lowker</th>
          <th>Kategori</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach($data as $dt)
          <tr>
            <td>{{ $dt->id_lowker }}</td>
            <td>{{ $dt->judul }}</td>
            <td>{{ $dt->nama }}</td>
            <td>{{ $dt->deadline }}</td>
            <td>{{ $dt->kategori }}</td>
            <td class="text-center">
              <button id='edit-lowker' data-toggle="modal" data-target="#modalEdit{{$dt->id_lowker}}" class="btn-xs btn-info" type="submit"><i class="fa fa-eye"></i> Details</button>
              <button id='setuju-lowker' data-toggle="modal" data-target="#modalValidasi{{$dt->id_lowker}}" class="btn-xs btn-success"><span class="glyphicon glyphicon-ok"></span> Setuju</button>
              <button id='tolak-lowker' data-toggle="modal" data-target="#modalNonValidasi{{$dt->id_lowker}}" class="btn-xs btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span> Tidak Setuju</button>
            </td>
          </tr>
          @include('layouts.modal')
        @endforeach
      </tbody>
    </table>
  </div>
<script>
function klikValidasi(){
  $("button").click(function() {
    if(this.id == 'setuju-lowker'){
      $('#message').text('Anda yakin ingin MENYETUJUI lowker ini?');
      $('#aksi').val('setuju');
    }else if(this.id == 'tolak-lowker'){
      $('#message').text('Anda yakin TIDAK MENYETUJUI Lowker ini?');
      $('#aksi').val('tidak-setuju');
    }
  });
}
</script>
@endsection