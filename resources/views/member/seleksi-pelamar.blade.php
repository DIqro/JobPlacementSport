@extends("layouts.master")
@section('title', 'JPS | Seleksi lowker')
@section("content")
<br><div class="container-fluid">
    <div class="row content" >
        <div class="col-sm-1"></div>
        <div class="col-sm-10" style="background-color: #edf0f2; border-radius: 10px;">
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
@if(count($lamaran) > 0)
    @if($lamaran[0]->id_pemilik == Auth::user()->id)
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#pelamar">Pelamar</a></li>
                <li><a data-toggle="tab" href="#lolos">Pelamar Lolos</a></li>
                <li><a data-toggle="tab" href="#tidak_lolos">Pelamar Tidak Lolos</a></li>
            </ul>
        <div class="well">
            <div class="tab-content" style="padding-top: 20px;">
                <div id="pelamar" class="tab-pane fade in active">
                    <div class="row content">
                        <table  class="table table-striped">
                            <thead style="background-color: #03a9f4">
                                <tr>
                                  <th class="text-center">Nama Pelamar</th>
                                  <th class="text-center">Tgl Lahir</th>
                                  <th class="text-center">CV</th>
                                  <th class="text-center">Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lamaran as $dt)
                                  @if($dt->status_lamaran == 'proses')
                                    <tr>
                                        <td class="text-center">{{ $dt->nama }}</td>
                                        <td class="text-center">{{ $dt->tgl_lahir }}</td>
                                        <td class="text-center">
                                            <form action='{{ url("lowker/cv-pelamar/$dt->id_pelamar") }}' method="post"  target="_blank">
                                                <button class="btn-xs btn-success" type="submit"><i class="fa fa-eye"></i> Tinjau CV</button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn-sm btn-success" href="{{ url('lowker/pelamar/lolos') }}" onclick='event.preventDefault(); document.getElementById("lolos-{{ $dt->id_lamaran }}").submit();'><span class="glyphicon glyphicon-ok"></span> Lolos</a>
                                            <a class="btn-sm btn-danger" href="{{ url('lowker/pelamar/tidak-lolos') }}" onclick='event.preventDefault(); document.getElementById("tidak-lolos-{{ $dt->id_lamaran }}").submit();'><span class="glyphicon glyphicon-remove"></span> TidakLolos</a>
                                        </td>
                                    </tr>

                                    <form id='lolos-{{ $dt->id_lamaran }}' action="{{ url('lowker/pelamar/lolos') }}" method="post" style="display: none;">
                                        <input type="hidden" name="id_lamaran" value="{{ $dt->id_lamaran }}">
                                        <input type="hidden" name="id_pelamar" value="{{ $dt->id_pelamar }}">
                                        <input type="hidden" name="id_lowker" value="{{ $dt->id_lowker }}">
                                    </form>
                                    <form id='tidak-lolos-{{ $dt->id_lamaran }}' action="{{ url('lowker/pelamar/tidak-lolos') }}" method="post" style="display: none">
                                        <input type="hidden" name="id_lamaran" value="{{ $dt->id_lamaran }}">
                                        <input type="hidden" name="id_pelamar" value="{{ $dt->id_pelamar }}">
                                        <input type="hidden" name="id_lowker" value="{{ $dt->id_lowker }}">
                                    </form>
                                  @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

               <div id="lolos" class="tab-pane fade">
                    <div class="row content">
                        <table  class="table table-striped">
                            <thead style="background-color: #03a9f4">
                                <tr>
                                  <th class="text-center">Nama Pelamar</th>
                                  <th class="text-center">Tgl Lahir</th>
                                  <th class="text-center">CV</th>
                                  <th class="text-center">Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lamaran as $dt)
                                  @if($dt->status_lamaran == 'lolos')
                                    <tr>
                                        <td class="text-center">{{ $dt->nama }}</td>
                                        <td class="text-center">{{ $dt->tgl_lahir }}</td>
                                        <td class="text-center">
                                            <form action='{{ url("lowker/cv-pelamar/$dt->id_pelamar") }}' method="post"  target="_blank">
                                                <button class="btn-xs btn-success" type="submit"><i class="fa fa-eye"></i> Tinjau CV</button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn-sm btn-danger" href="{{ url('lowker/pelamar/tidak-lolos') }}" onclick='event.preventDefault(); document.getElementById("tidak-lolos-{{ $dt->id_lamaran }}").submit();'><span class="glyphicon glyphicon-remove"></i> Batalkan Kelolosan</a>
                                        </td>
                                    </tr>
                                    <form id='tidak-lolos-{{ $dt->id_lamaran }}' action="{{ url('lowker/pelamar/tidak-lolos') }}" method="post" style="display: none">
                                        <input type="hidden" name="id_lamaran" value="{{ $dt->id_lamaran }}">
                                        <input type="hidden" name="id_pelamar" value="{{ $dt->id_pelamar }}">
                                        <input type="hidden" name="id_lowker" value="{{ $dt->id_lowker }}">
                                    </form>
                                  @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="tidak_lolos" class="tab-pane fade">
                    <div class="row content">
                        <table  class="table table-striped">
                            <thead style="background-color: #03a9f4">
                                <tr>
                                  <th class="text-center">Nama Pelamar</th>
                                  <th class="text-center">Tgl Lahir</th>
                                  <th class="text-center">CV</th>
                                  <th class="text-center">Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lamaran as $dt)
                                  @if($dt->status_lamaran == 'tidak lolos')
                                    <tr>
                                        <td class="text-center">{{ $dt->nama }}</td>
                                        <td class="text-center">{{ $dt->tgl_lahir }}</td>
                                        <td class="text-center">
                                            <form action='{{ url("lowker/cv-pelamar/$dt->id_pelamar") }}' method="post"  target="_blank">
                                                <button class="btn-xs btn-success" type="submit"><i class="fa fa-eye"></i> Tinjau CV</button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn-sm btn-success" href="{{ url('lowker/pelamar/lolos') }}" onclick='event.preventDefault(); document.getElementById("lolos-{{ $dt->id_lamaran }}").submit();'><span class="glyphicon glyphicon-ok"></i> Ubah Menjadi Lolos</a>
                                        </td>
                                    </tr>

                                    <form id='lolos-{{ $dt->id_lamaran }}' action="{{ url('lowker/pelamar/lolos') }}" method="post" style="display: none;">
                                        <input type="hidden" name="id_lamaran" value="{{ $dt->id_lamaran }}">
                                        <input type="hidden" name="id_pelamar" value="{{ $dt->id_pelamar }}">
                                        <input type="hidden" name="id_lowker" value="{{ $dt->id_lowker }}">
                                    </form>
                                  @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h3>Bukan Hak Anda</h3>
    @endif
@else
    <div class="alert alert-warning" align="center">
        <strong>Belum</strong> ada orang yang mendaftar lowker ini.
    </div> 
@endif
    </div>
</div>
@endsection