@extends("admin.menu-admin")
@section('title', 'JPS | Data member')
@section("content-admin")

  <div class="container">
    <h2>Tabel Data Pengguna</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Tanggal Lahir</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach($member as $dt)
        <tr>
          <td>{{ $dt->id }}</td>
          <td>{{ $dt->nama }}</td>
          <td>{{ $dt->email }}</td>
          <td>{{ $dt->alamat }}</td>
          <td>{{ $dt->tgl_lahir }}</td>
          <td class="text-center">
              <button id='setuju-lowker' data-toggle="modal" data-target="#modalEditAkun{{ $dt->id }}" class="btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</button>
              <button id='tolak-lowker' data-toggle="modal" data-target="#modalDeleteAkun{{ $dt->id }}" class="btn-xs btn-danger" type="submit"><i class="fa fa-trash-o"></i> Hapus</button>
            </td>
        </tr>
        @include("layouts.modal")
        @endforeach
      </tbody>

    </table>
  </div>
@endsection