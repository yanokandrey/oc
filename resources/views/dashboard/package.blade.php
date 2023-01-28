@extends('dashboard/layout')
@section('title')
OrderConstructor - daahboard/package
@endsection
@section('topmenu')
	@include('dashboard.topmenu')
@endsection
@section('sidebar')
	@include('dashboard.sidebar')
@endsection
@section('footer')
	@include('dashboard/footer')
@endsection
@section('main')
<div class='container'>
    <div class='row'>
		<div class='col-lg-12 col-md-12 col-xs-12 BlockTitle'>
		Packeges\ {{$package->name}}
		</div>
    </div>
    </div>
    <form action="{{ route('updatePackage') }}" method="POST" enctype="multipart/form-data">
    <div class='row'>
	    <div class='col-lg-6 col-md-6 col-xs-6 pt-1 pb-1 dotted-frame'>
	        @csrf
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='id' type='hidden' value='{{ $package->id}}'><input name='name' type='text' class='form-control' value='{{ $package->name }}'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'>
					<textarea name='description' class='form-control'>{{ $package->description }}</textarea></div>
            </div>
			<div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'>
					<img class='imageThumbnail' src='/storage/thumbnails/{{$package->image}}'>&nbsp;{{$package->image}}
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='image' type='file' class='form-control'>
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='weight' type='text' class='form-control' value='{{ $package->weight }}'>
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='price' type='text' class='form-control' value='{{ $package->price }}'>
				</div>
            </div>
			<div class='row'>
	            <div class='col-lg-4 col-md-4 col-xs-4 text-start'>
					<a class='btn btn-danger btn-block' href='{{ route('dashboard.deletePackage', $package->id)}}'>delete</a>
				</div>
				<div class='col-lg-8 col-md-8 col-xs-8 text-end'>
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