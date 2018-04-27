@extends('master') @section('content')
<!-- <div class="container my-5">

	<div class="row">
		@if($categories) @foreach($categories as $category)
		<div class="col-md-3 col-sm-6">
			<img width="200" src="{{asset('images/categories/' . $category['image'])}}" />
			<h3>{{$category['title']}}</h3>
			<p>{!! $category['article'] !!}</p>
			<a class="btn btn-classic" href="{{url('shop/' . $category['url'])}}">
				למעבר למוצרים
			</a>


		</div>

		@endforeach @else
		<div class="col-md-12">
			<p>אין קטגוריות לתצוגה</p>
		</div>
		@endif
	</div>
</div> -->


<div class="container-fluid">

	<div class="row">
		@if($categories) @foreach($categories as $category)
		<div class="col-md-4 col-sm-12 m-0 p-0">
			<a href="{{url('shop/' . $category['url'])}}">
				<div class="cat-links-wrap">
					<div class="cat-back" style="background:url({{asset('images/categories/' . $category['image'])}}) no-repeat center; background-size:cover"></div>
					<div class="overlay"></div>
					<div class="cat-links">
						<h3>{{$category['title']}}</h3>
						<p>{!! $category['article'] !!}</p>
						<i class="icon ion-ios-arrow-thin-left"></i>
					</div>
				</div>
			</a>

		</div>

		@endforeach @else
		<div class="col-md-12">
			<p>אין קטגוריות לתצוגה</p>
		</div>
		@endif
	</div>
</div>
@endsection