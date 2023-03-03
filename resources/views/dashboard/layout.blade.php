<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">1
	<link href="/css/style.css" rel="stylesheet">
	@include('dashboard/favicon')
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
			<div class='col-lg-2 col-md-3 col-sm-12'>
			@yield('sidebar')
			</div>
			<div class='col-lg-7 col-md-5 col-sm-12 h-100'>
			@yield('main')
			</div>
			<div class='col-lg-3 col-md-4 col-sm-12'>
			@yield('hint')
			</div>
		</div>
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12 text-center footer'>
			@yield('footer')
			</div>
		</div>
		@endauth
		@guest
			@yield('guest')
		@endguest
	</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>