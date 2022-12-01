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
	<form name='submit' action="dashboard.welcomePage" method="POST" enctype="multipart-form/data">
	<div class='row w100 Block'>
		<div class='BlockTitle'>
			Wellcome page
		</div>
		<div class='col-12 blockfile'>
			<div class='col-12'>
				Icon-logo <small>(for bookmark)</small>
			</div>
			<div class='col-12'>
				<input type='file' name='favicon' placeholder='favicon' class='form-control'>
			</div>
		</div>
		<div class='col-12 blockfile'>
			<div class='col-12'>
				Smal-logo <small>(for topmenu)</small>
			</div>
			<div class='col-12'>
				<input type='file' name='favicon' placeholder='fvicon' class='form-control'>
			</div>
		</div>
		<div class='col-12 blockfile'>
			<div class='col-12'>
				Wellcome image <small>(for wellcome screen)</small>
			</div>
			<div class='col-12'>
				<input type='file' name='favicon' placeholder='fvicon' class='form-control'>
			</div>
		</div>
		<div class='col-12'>
			<textarea name='about' placeholder='About' class='form-control'></textarea>
		</div>
		<div class='col-12'>
			<input type='text' name='footer' placeholder='footer' class='form-control'>
		</div>
		<div class='col-12'>
			<button type="submit" name="submit" class="btn btn-outline-success btn-block mt-4">Submit</button>
		</div>
	</div>
	</form>
</div>
@endsection
@section('guest')
GUEST
@endsection