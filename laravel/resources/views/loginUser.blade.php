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
  <body>
    <nav class="navbar fixed-top"> 
        <hr>
        <ul class="navbar-nav">
          <li class="nav-item positi">
            <a class="btn btn-outline-light" href="{{ url('/logout') }}">Logout </a>
          </li>
        </ul>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <img class="mb-4" src="{{ asset('img/DSCF5569.JPG') }}" alt="" width="500" height="400">
        </div>
        <div class="col-sm">
          <form class="card form-signin" method="post" action="{{ url('/user') }}">
            @csrf
          <h1 class="h3 mb-3 font-weight-normal text-center">Login Pemilih</h1>
          <h5 class="h5 mb-3 font-weight-normal text-center">Jurusan {{ $jurusan -> nama_jurusan }}</h5>
          <!-- Area Username -->
          <label for="inputusername" class="sr-only">Username</label>
          <input type="text" id="inputusername" class="form-control" placeholder="Username" name="usernameUser" required autofocus>
          <!-- Area Password -->
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="passwordUser" required>
          <!-- Area Button -->
          <button class="btn btn-lg btn-outline-primary btn-block" type="submit" >Sign in</button>
          <p class="mt-5 mb-3 text-muted text-center">&copy; Pemira 2018</p>
          </form>
        </div>
      </div>
    </div>
  </body>
  <style>
  body { 
    background: url("{{ asset('img/background.jpg') }}");
    background-size: cover;
  }
  </style>
</html>
