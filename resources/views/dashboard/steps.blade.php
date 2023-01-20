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
  
	<div class='col-lg-8 col-md-8 col-xs-8'><a href="{{ route('dashboard.stepEdit', $step->id) }}" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
             </svg>
		    </a></div>
  </div>
 
@endforeach
<form action="addStep" method="POST" enctype="multipart/form-data">
	@csrf
	<div class='row'>
		<div class='col-3'><input name='name' type='text' class='form-control' placeholder='Step name'>&nbsp;</div>
		<div class='col-1'><button type="submit" name="submit" class="btn btn-success btn-block">+</button></div>
	</div>
</form>
@endsection
@section('guest')
GUEST
@endsection