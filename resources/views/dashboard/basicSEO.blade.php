@extends('dashboard/layout')
@section('title')
OrderConstructor - daahboard/mainpage
@endsection
@section('topmenu')
	@include('dashboard/topmenu')
@endsection

@section('sidebar')
	@include('dashboard/sidebar')
@endsection
@section('footer')
	@include('dashboard/footer')
@endsection
@section('main')
<div class='conteiner'>
	<form action='saveSeoParameter' method='POST' enctype='multipart/form-data'>
	@csrf
	<div class='row'>	
		<div class='col-12 BlockTitle'>
			SEO
		</div>
	</div>
	<div class='row'>
		<div class='col-5 mb-2'>
			<input type='text' name='seoTitle' placeholder='Title' class='form-control' value='{{$title}}'>
		</div>
	</div>
	<div class='row'>
		<div class='col-5 mb-2'>
			<textarea name='seoDescription' placeholder='Description' class='form-control'>{{$description}}</textarea>
		</div>
	</div>
	<div class='row'>
		<div class='col-5 mb-2'>
			<textarea name='seoKeywords' placeholder='Keywoards' class='form-control'>{{$keywords}}</textarea>
		</div>
	</div>
	<div class='row'>
		<div class='col-5 mb-2'>
			<textarea name='seoRobots' placeholder='Robots'  class='form-control' rows='6'>{{$robots}}</textarea>
		</div>
	</div>
	<div class='row'>
		<div class='col-5 text-end'>
			<button type="submit" name="submit2" class="btn btn-success btn-block mt-4">Submit</button>
		</div>
	</div>	
	</form>
</div>
@endsection
@section('guest')
GUEST
@endsection