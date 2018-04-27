@extends('master') @section('content')
<div class="container my-5">
	<div class="row">
		<div class="col-md-12 mb-3">
			<!--ltrim($title,'Epic | ')-->
			<h1>{{$title}}</h1>
		</div>
	</div>
	<div class="row">

		@if($products)
		<div class="col-md-12 mb-5">
			<a class="btn btn-danger mt-3" href="{{url('shop/clear-wishlist')}}">נקה פריטים שמורים</a>
		</div>

		@foreach($products as $product)
		<div class="col-md-3 col-sm-6">
			<img width="200" src="{{asset('images/products/' . $product['image'])}}" />
			<h3>{{$product['title']}}</h3>
			<p>{!! $product['article'] !!}</p>
			<p>
				<b>מחיר:</b> {{$product['price']}}₪</p>
			<a class="btn btn-secondary" href="{{url('shop/' . $product['c_url'] . '/' . $product['url'])}}">
				פרטים נוספים
			</a>
			@if(Cart::get($product['id']))
			<input disabled="disabled" type="button" value="נמצא בסל" class="add-to-cart btn btn-classic"> @else
			<input data-id="{{$product['id']}}" type="button" value="הוסף לסל" class="add-to-cart btn btn-classic"> @endif
		</div>

		@endforeach @else
		<div class="col-md-12">
			<p>אין מוצרים לתצוגה</p>
		</div>
		@endif
	</div>
</div>
@endsection