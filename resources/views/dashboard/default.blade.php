
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <title>@yield('title')</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>

  <body>
    <!-- Head from dashboard -->
	@include('dashboard.head')

    <div class="container-fluid">
      <div class="row">
        <!-- nav from dashboard -->
         @include('dashboard.nav')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         @yield('content')
        </main>
      </div>
    </div>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jQuery v3.6.0.js') }}"></script>
  </body>
</html>
