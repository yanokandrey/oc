@extends('dashboard/layout')
@section('title')
 - daahboard/step
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
<div class='container'>
    <div class='row'>
		<div class='col-lg-12 col-md-12 col-xs-12 BlockTitle'>
		<a href="{{ route('dashboard.steps') }}">Steps</a>\ <a href="{{ route('dashboard.step', $component->step) }}">{{$activeStep->name}}</a>\ {{ $component->name }}
		</div>
    </div>
    </div>
    <form action="{{ route('updateComponent') }}" method="POST" enctype="multipart/form-data">
    <div class='row'>
	    <div class='col-lg-6 col-md-6 col-xs-6 pt-1 pb-1 dotted-frame'>
	        @csrf
            			<div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'>
					<img class='imageThumbnail' src='/storage/thumbnails/{{$component->image}}'>&nbsp;{{$component->image}}
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='image' type='file' class='form-control'>
				</div>
            </div>
			<div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'><input name='id' type='hidden' value='{{ $component->id}}'><input name='name' type='text' class='form-control' value='{{ $component->name }}'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'><input name='step' type='hidden' class='form-control' value='{{ $activeStep->id }}'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'>
					<textarea name='description' class='form-control'>{{ $component->description }}</textarea></div>
            </div>

            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='weight' type='text' class='form-control' value='{{ $component->weight }}'>
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='price' type='text' class='form-control' value='{{ $component->price }}'>
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 text-end'>
					<a class='btn btn-danger btn-block' href='{{ route('dashboard.deleteComponent', $component->id)}}'>delete</a>
					<button type='submit' class='btn btn-success btn-block'>update</button>
				</div>
            </div>
		</div>
	</div>
	</form>
</div>
@endsection
@section('guest')
GUEST
@endsection