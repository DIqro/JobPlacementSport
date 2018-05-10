@extends("admin.menu-admin")
@section('title', 'JPS | Lowker valid')
@section("content-admin")

  <div class="container">
    <h2>Daftar Lowongan Pekerjaan yang Valid</h2>
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
              <button id='setuju-lowker' data-toggle="modal" data-target="#modalEdit{{ $dt->id_lowker }}" class="btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</button>
              <button id='tolak-lowker' data-toggle="modal" data-target="#modalDelete{{ $dt->id_lowker }}" class="btn-xs btn-danger" type="submit"><i class="fa fa-trash-o"></i> Hapus</button>
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