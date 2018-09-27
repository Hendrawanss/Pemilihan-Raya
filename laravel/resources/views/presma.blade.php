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
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body class="text-right">
    <div class="container-fluid">
      <h1 class="text-center text-white fixed-top">Calon Presma dan Wapresma</h1>
      <div class="row">
        @foreach($presma as $data)
        <div class="col-4 text-center">
            <h5 class="text-center text-white">{{ $data -> urutan}}</h4>
            <a class="" href="{{ url('/presma', $data -> urutan) }}">
                <img class="border border-dark" src="{{ asset('img/'.$data->foto_presma) }}" title="{{ $data -> presma}}" alt="Foto Presma" width="180" height="240">
                <img class="border border-dark" src="{{ asset('img/'.$data->foto_wapresma) }}" title="{{ $data -> wapresma}}" alt="Foto Wapresma" width="180" height="240">
            </a>
        </div>
        @endforeach
      </div>
    </div>
  </body>
  <style>
    body { 
      padding-top: 30px;    
    } 
    .container{
      padding-top: 50px;
    }
    .row{
        padding-top: 70px;
    }
    img {
      margin: 1px; 
      margin-bottom: 20px;
    }
  </style>
</html>
