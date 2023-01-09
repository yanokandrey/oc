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
	<form action="saveWelcomeParameter" method="POST" enctype="multipart/form-data">
	@csrf
	<div class='row w100 Block'>
		<div class='BlockTitle'>
			Wellcome page
		</div>
		<div class='col-12 blockfile'>
			<div class='col-lg-12'><img class='favicon' src='../{{$favicon}}'>&nbsp;{{$favicon}}</div>
			<div class='col-lg-12'>
				Icon-logo <small>(for bookmark)</small>
			</div>	
			<div class='col-12'>
				<input accept='.ico,.icon,.png' type='file' name='favicon' placeholder='favicon' class='form-control'>
			</div>
		</div>
		<div class='col-12 blockfile'>
			<div class='col-lg-12'><img class='logo' src='../storage/{{$logo}}'>&nbsp;{{$logo}}</div>
			<div class='col-12'>
				Logo <small>(for topmenu)</small>
			</div>
			<div class='col-12'>
				<input accept='image/png, image/jpeg' type='file' name='logo' class='form-control'>
			</div>
		</div>
		<div class='col-12 blockfile'>
			<div class='col-lg-12'><img class='imageThumbnail' src='../storage/thumbnails/{{$image}}'>&nbsp;{{$image}}</div>
			<div class='col-12'>
				Wellcome image <small>(for wellcome screen)</small>
			</div>
			<div class='col-12'>
				<input accept='image/png, image/jpeg' type='file' name='welcomeImage' class='form-control'>
			</div>
		</div>
		<div class='col-12 mb-2'>
			<textarea name='welcomeText' rows='6' placeholder='Welcome page text' class='form-control'>{{$text}}</textarea>
		</div>
		<div class='col-12'>
			<input type='text' name='welcomeFooter' placeholder='footer' class='form-control' value='{{$footer}}'>
		</div>
		<div class='col-12'>
			<button type="submit" name="submit" class="btn btn-success btn-block mt-4">Submit</button>
		</div>
	</div>
	</form>
</div>
@endsection
@section('guest')
GUEST
@endsection