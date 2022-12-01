@extends('layout')
@section('title')
OrderConstructor
@endsection
@section('guest')
<div class='container text-center'>
	<div class='row'>
		<div class='col-12'>
			<h2>Welcome to OrderConstructor</h2>
		</div>
	</div>
	<div class='row'>
		<div class='col-12'>
		<a href='{{ $google_url }}'>Login with Google</a>
		</div>
	</div>
</div>
@endsection