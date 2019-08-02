<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="/favicon.png" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Опросник "Народный рейтинг"</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
  <div id="app">
		<main>
			<div class="container-fluid bg-gradient-primary py-5">
			  @yield('content')
			</div>
		</main>
  
		<footer>
			<div class="container">
				<div class='row align-items-center justify-content-center'>
				<p class="copyright float-left">&copy; 2019<!--&ndash;<?echo date("Y");?>--> команда  <b>RedAlert</b></p>		
				</div>
			</div>
		</footer>

  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}">  </script>
  <script src="{{ asset('js/select2.js') }}">  </script>

  @yield('scripts')
</body>
</html>
