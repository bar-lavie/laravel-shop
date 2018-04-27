@extends('master') @section('content')
<div class="container my-5">
	<div class="row">
		<div class="col-md-12">
			<!--ltrim($title,'Epic | ')-->
			<h1>{{$title}}</h1>
		</div>
		@if($search) @foreach($search as $result)
		<div class="col-md-3 col-sm-6 mt-5">
			<img width="200" src="{{asset('images/products/' . $result['image'])}}" />
			<h3>{{$result['title']}}</h3>
			<p>{!! $result['article'] !!}</p>
			<p>
				<b>מחיר:</b> {{$result['price']}}₪</p>
			<a class="btn btn-secondary" href="{{url('shop/' . $result['c_title'] . '/'. $result['url'])}}">
				פרטים נוספים
			</a>
			@if(Cart::get($result['id']))
			<input disabled="disabled" type="button" value="נמצא בסל" class="add-to-cart btn btn-classic"> @else
			<input data-id="{{$result['id']}}" type="button" value="הוסף לסל" class="add-to-cart btn btn-classic"> @endif
		</div>

		@endforeach @else
		<div class="col-md-12">
			<p>אין מוצרים לתצוגה</p>
		</div>
		@endif
	</div>
</div>
@endsection