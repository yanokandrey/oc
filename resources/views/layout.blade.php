<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@include('description')">
    <meta name="keywords" content="@include('keywords')">
    <title>@include('title') - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link href="/css/style.css" rel="stylesheet">
	@include('favicon')
 </head>
  <body>
	<div class='container' style='height: 100%;'>
		@auth                                        
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
			@yield('topmenu')
			</div>
		</div>
		<div class='row h-100'>
			<div class='col-lg- col-md-4 col-sm-12'>
			@yield('sidebar')
			</div>
			<div class='col-lg-8 col-md-8 col-sm-12 h-100'>
			@yield('main')
			</div>
		</div>
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
			@yield('footer')
			</div>
		</div>
		@endauth
			@yield('guest')
		@guest
		
		@endguest
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>