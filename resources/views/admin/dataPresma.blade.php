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
                    <th>Presma</th>
                    <th>Wapresma</th>
                    <th>Foto Presma</th>
                    <th>Foto Wapresma</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($presma as $presma)
                  <tr>
                    <td>{{ $presma -> no }}</td>
                    <td>{{ $presma -> urutan }}</td>
                    <td>{{ $presma -> presma }}</td>
                    <td>{{ $presma -> wapresma }}</td>
                    <td>{{ $presma -> foto_presma }}</td>
                    <td>{{ $presma -> foto_wapresma }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection