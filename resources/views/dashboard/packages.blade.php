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
<div class='row'>
		<div class='BlockTitle'>
			Packages
		</div>
</div>
@foreach($packages as $package)
			<div class='row'><a href="{{ route('dashboard.package', $package->id) }}">
	            <div class='col-lg-6 col-md-6 col-xs-6 mb-1'>
					<img class='imageThumbnail' src='/storage/thumbnails/{{$package->image}}'>&nbsp;{{$package->name}}
				</div></a>
            </div> 
 <!-- <div class='row mt-1 mb-1'>
		<div class='col-lg-6 col-md-6 col-xs-6 fs-6 border border-secondary-subtle border-start-0 border-end-0 text-uppercase bg-light text-dark'><a href="{{ route('dashboard.package', $package->id) }}">{{ $package->name }}&nbsp;</a></div>
  </div>!-->
@endforeach
 <form action="{{ route('addPackage') }}" method="POST" enctype="multipart/form-data">
    <div class='row mt-3'>
	    <div class='col-lg-6 col-md-6 col-xs-6 pt-1 pb-1 dotted-frame'>
	        @csrf
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'><input name='name' type='text' class='form-control' placeholder='Name'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'><textarea name='description' class='form-control' placeholder='Description'></textarea></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'><input name='image' type='file' class='form-control'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'><input name='weight' type='text' class='form-control' placeholder='weight'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'><input name='price' type='text' class='form-control' placeholder='price'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 text-end'><button type='submit' class='btn btn-success btn-block'>add</button></div>
            </div>
		</div>
	</div>
	</form>
@endsection
@section('guest')
GUEST
@endsection