@extends('admin.layout')

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nomor Urut</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Foto BPM</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($bpm as $bpm)
                  <tr>
                    <td>{{ $bpm -> no }}</td>
                    <td>{{ $bpm -> urutan }}</td>
                    <td>{{ $bpm -> nim }}</td>
                    <td>{{ $bpm -> nama_mhs }}</td>
                    <td>{{ $bpm -> nama_jurusan }}</td>
                    <td>{{ $bpm -> foto }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection