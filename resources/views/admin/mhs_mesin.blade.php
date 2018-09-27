@extends('admin.layout')

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Progam Studi</th>
                    <th>Jurusan</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($mhs_mesin as $mhs)
                  <tr>
                    <td>{{ $mhs -> nim }}</td>
                    <td>{{ $mhs -> nama_mhs }}</td>
                    <td>{{ $mhs -> kelas }}</td>
                    <td>{{ $mhs -> prodi }}</td>
                    <td>{{ $mhs -> nama_jurusan }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection