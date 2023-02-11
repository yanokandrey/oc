@extends('dashboard/layout')
@section('title')
 - daahboard/delivery
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
			Delivery 
		</div>
</div>
@foreach($deliveries as $delivery)
			<div class='row'><a href="{{ route('dashboard.delivery', $delivery->id) }}">
	            <div class='col-lg-6 col-md-6 col-xs-6 mb-1'>
					<img class='imageThumbnail' src='/storage/thumbnails/{{$delivery->image}}'>&nbsp;{{$delivery->name}}
				</div></a>
            </div> 
@endforeach
    <div class='pt-2'>
		<button type='button' class="btn btn-primary" data-toggle="collapse" data-target="#showForm">Add new delivery</button>
	</div>
	<div id='showForm' class='collapse'>
 <form action="{{ route('addDelivery') }}" method="POST" enctype="multipart/form-data">
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
	</div>
@endsection
@section('guest')
GUEST
@endsection