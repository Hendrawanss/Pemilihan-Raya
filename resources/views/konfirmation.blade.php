<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Pemira 2018</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('bower_components/bootstrap/sign.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
	  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>  
    <div class="container">
      <div class="card card-body">
            <h1 class="text-center">Konfirmasi</h1>
            <hr>
            <div class="row">
              <div class="col-6 text-center">
                  <h3 class="text-center">Presma dan Wapresma</h3>
                  <img class="border border-dark" src="{{ asset('img/'.$presma -> foto_presma) }}" title="{{ $presma -> presma }}" alt="Foto Presma" width="180" height="240">
                  &nbsp;
                  <img class="border border-dark" src="{{ asset('img/'.$presma -> foto_wapresma) }}" title="{{ $presma -> wapresma }}" alt="Foto Wapresma" width="180" height="240">
                  <h6 class="text-center">{{ $presma -> presma }} dan {{ $presma -> wapresma }}</h6>
              </div>
              <div class="col-6 text-center">
                  <h3 class="text-center">Bpm</h3>
                  <img class="border border-dark" src="{{ asset('img/'.$bpm -> foto) }}" title="{{ $bpm -> nama_mhs }} " alt="Foto Bpm" width="180" height="240">
                  <h6 class="text-center">{{ $bpm -> nama_mhs }}</h6>
              </div>
            </div>
            <div class="row">
                  <hr>
                  <a class="btn btn-danger" href="{{ url('/user') }}">Batal</a>&nbsp;
                  <a class="btn btn-primary" href="{{ url('konfirmasi') }}">Submit</a>
            </div>
      </div>
    </div>
  </body>
  <style>
  body { 
    padding-top: 70px;   padding-bottom: 30px; 
    background: url("{{ asset('img/background.jpg') }}");
    background-size: cover;    
  } 
  </style>
</html>
