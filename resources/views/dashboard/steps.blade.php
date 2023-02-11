@extends('dashboard/layout')
@section('title')
- daahboard/steps
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
<div class='row'>
		<div class='BlockTitle'>
			Steps
		</div>
</div>
@foreach($steps as $step)

  <div class='row mt-1 mb-1'>
	<div class='col-lg-2 col-md-2 col-xs-2 fs-6 border border-secondary-subtle border-start-0 border-end-0 text-uppercase bg-light text-dark'><a href="{{ route('dashboard.step', $step->id) }}">{{ $step->name }}&nbsp;</a></div>
  
	<div class='col-lg-8 col-md-8 col-xs-8'></div>
  </div>
 
@endforeach
    <div class='pt-2'>
		<button type='button' class="btn btn-primary" data-toggle="collapse" data-target="#stepAdd">Add step</button>
	</div>
	<div id='stepAdd' class='collapse'>
<form action="addStep" method="POST" enctype="multipart/form-data">
	@csrf
	<div class='row'>
		<div class='col-3'><input name='name' type='text' class='form-control' placeholder='Step name'>&nbsp;</div>
		<div class='col-1'><button type="submit" name="submit" class="btn btn-success btn-block">+</button></div>
	</div>
</form>
</div>
@endsection
@section('guest')
GUEST
@endsection