@extends('dashboard/layout')
@section('title')
OrderConstructor - daahboard/delivery
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
		<div class='col-lg-8 col-md-8 col-xs-8 BlockTitle'>
		Delivery\ {{$delivery->name}}&nbsp;
		
		    <a href="{{ route('dashboard.delivery', $delivery->id) }}" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
             </svg>
		    </a>
        </div>
    </div>
    <form action="{{ route('updateDelivery') }}" method="POST" enctype="multipart/form-data">
    <div class='row'>
	    <div class='col-lg-6 col-md-6 col-xs-6 pt-1 pb-1 dotted-frame'>
	        @csrf
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='id' type='hidden' value='{{ $delivery->id}}'><input name='name' type='text' class='form-control' value='{{ $delivery->name }}'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'></div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'>
					<textarea name='description' class='form-control'>{{ $delivery->description }}</textarea></div>
            </div>
			<div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12 mb-1'>
					<img class='imageThumbnail' src='/storage/thumbnails/{{$delivery->image}}'>&nbsp;{{$delivery->image}}
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='image' type='file' class='form-control'>
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='weight' type='text' class='form-control' value='{{ $delivery->weight }}'>
				</div>
            </div>
            <div class='row'>
	            <div class='col-lg-12 col-md-12 col-xs-12'>
					<input name='price' type='text' class='form-control' value='{{ $delivery->price }}'>
				</div>
            </div>
			<div class='row'>
	            <div class='col-lg-4 col-md-4 col-xs-4 text-start'>
					<a class='btn btn-danger btn-block' href='{{ route('dashboard.deleteDelivery', $delivery->id)}}'>delete</a>
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