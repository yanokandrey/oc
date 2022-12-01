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
	<form name='submit2' action='../dashboard.basicsSEO' method='POST' enctype='multipart-form/data'>
	@csrf
	<div class='row w100'>	
		<div class='col-12 BlockTitle'>
			SEO
		</div>
		<div class='col-12'>
			<input type='text' name='title' placeholder='Title'  class='form-control'>
		</div>
		<div class='col-12'>
			<textarea placeholder='Description'  class='form-control'></textarea>
		</div>
		<div class='col-12'>
			<textarea placeholder='Keywoards'  class='form-control'></textarea>
		</div>
		<div class='col-12'>
			<textarea placeholder='Robots'  class='form-control' rows='6'></textarea>
		</div>
		<div class='col-12'>
			<button type="submit" name="submit2" class="btn btn-outline-success btn-block mt-4">Submit</button>
		</div>
	</div>	
	</form>
</div>
@endsection
@section('guest')
GUEST
@endsection