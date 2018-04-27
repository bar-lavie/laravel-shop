@extends('master') @section('content')

<script>
	var products = {!!json_encode($products, JSON_UNESCAPED_UNICODE) !!};
	var inCart = {!!json_encode(Cart::getContent(), JSON_UNESCAPED_UNICODE) !!};
	var inWishlist = {!!json_encode(Wishlist::getContent(), JSON_UNESCAPED_UNICODE) !!};
</script>
<div class="container my-5">

	<div ng-app="epic_products" ng-controller="products_controller">
		<div class="row">

			<div class="col-md-12  mb-3">
				<!--ltrim($title,'Epic | ')-->
				<h1>{{$title}}</h1>
			</div>
		</div>

		@if($products)
		<div class="row mt-5">


			<div class="form-group col-md-2">
				<input class="form-control" type="text" placeholder="חיפוש מוצרים" ng-model="searchText">
			</div>

			<div class="form-group col-md-2">
				<select class="form-control" ng-model="sortPrice">
					<option value="">סינון לפי מחיר</option>
					<option value="-price">גבוה לנמוך</option>
					<option value="+price">נמוך לגבוה</option>
				</select>
			</div>

			<!--<div id="sort-price-links">
                    <button type="button" class="btn btn-secondary" ng-click="sortByPrice('-price')">גבוה לנמוך</button>
                    <button type="button" class="btn btn-secondary" ng-click="sortByPrice('+price')">נמוך לגבוה</button>
                </div>-->


		</div>


		<div class="row">
			<div class="col-md-3" ng-repeat="product in products| orderBy : sortPrice :true | orderBy : byPrice :true| filter:searchText">
				<div class="card">
					<div class="card-block">
						<h3 class="text-center">@{{product.title}}</h3>
						<img class="img-fluid" ng-src="{{asset('images/products')}}/@{{product.image}}">

						<p ng-bind-html="product.article | unsafe"></p>
						<p>
							<b>@{{product.price}}₪</b>
						</p>

						<a class="btn btn-secondary d-block mb-3" href="{{url('shop/'. $category_url)}}/@{{product.url}}">
							פרטים נוספים
						</a>

						<button ng-disabled="inCart[product.id] ? true : false" ng-click="" data-id="@{{product.id}}" type="button" class="add-to-cart btn btn-classic">@{{inCart[product.id] ? 'המוצר בעגלה' : 'הוסף לסל '}}</button>
						<button ng-disabled="inWishlist[product.id] ? true : false" ng-click="" data-id="@{{product.id}}" type="button" class="add-to-wishlist btn btn-link">
							<i ng-class="{'icon ion-ios-heart': inWishlist[product.id], 'icon ion-ios-heart-outline': !inWishlist[product.id]}"></i>
						</button>


					</div>

				</div>
			</div>
		</div>
		@else
		<div class="row">

			<div class="col-md-12">
				<p>אין מוצרים לתצוגה</p>
			</div>
		</div>

		@endif

	</div>
</div>

@endsection