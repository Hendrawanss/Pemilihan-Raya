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

  <body class="text-center">
    <form class="card form-signin" method="post" action="{{ url('/login') }}">
        @csrf
      <h1 class="h3 mb-3 font-weight-normal">Login TPS Jurusan</h1>
      <!-- Area Username -->
      <label for="inputusername" class="sr-only">Email address</label>
      <input type="text" id="inputusername" class="form-control" placeholder="Username" name="usernameJur" required autofocus>
      <!-- Area Password -->
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="passwordJur" required>
      <!-- Area Button -->
      <button class="btn btn-lg btn-outline-primary btn-block" type="submit" >Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; Pemira 2018</p>
    </form>
  </body>
  <style>
  body {  
    background: url("{{ asset('img/background.jpg') }}");
    background-size: cover;
  }
  </style>
</html>
