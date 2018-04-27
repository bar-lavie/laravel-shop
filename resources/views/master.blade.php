<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="UTF-8">
	<title>
		@if (!empty($title)) {{$title}} @endif
	</title>
	<!-- social media tags -->
	<meta property="og:site_name" content="" />
	<meta property="og:url" content="{{url('')}}" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="{{asset('assets/ogimage.png')}}" />
	<!-- Favicon and Apple Icons-->
	<link rel="icon" type="image/png" href="{{asset('assets/favicon.png')}}">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" type="image/png" href="favicon.png">
	<link rel="apple-touch-icon" href="touch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
	<!-- google tags -->
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="">
	<!-- Mobile Specific Meta Tag-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#000">
	<!-- AngularJS -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular-sanitize.js"></script>
	<!-- css links -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
	    crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{url('css/style.css')}}">
	<!-- google analytics -->
	<!-- Base Url -->
	<script>
		var BASE_URL = "{{url('')}}/"
	</script>
</head>

<body>
	<div class="cat-menu">
		<div class="close-cat-menu">
			<i class="icon ion-ios-close-outline"></i>
		</div>
		<div class="user-options d-flex align-items-center flex-column">
			<div class="options-title text-center">
				@if(!Session::has('user_id'))
				<h4 class="text-uppercase">epic</h4>
				@else
				<h4 class="text-uppercase">welcome back</h4>
				<h4> {{Session::get('user_name')}}</h4>
				@endif
			</div>
			@if(!Session::has('user_id'))
			<a href="#" data-toggle="modal" data-target="#login-modal">הירשם/התחבר</a>
			@else
			<a href="{{url('user/logout')}}">התנתק</a>
			@endif
		</div>

		<div class="categories-list">
			<ul>
				<li>
					<a href="{{url('shop')}}">
						<b>כל הקטגוריות</b>
						<i class="icon ion-android-arrow-dropleft"></i>
					</a>
				</li>
				@if($categories) @foreach($categories as $category)
				<li>
					<a href="{{url('shop/'.$category['url'])}}">{{$category['title']}}
						<i class="icon ion-android-arrow-dropleft"></i>
					</a>
				</li>
				@endforeach @endif
			</ul>
		</div>
	</div>


	<div class="page-wrap">
		<div class="container-fluid no-padding">

			<header>

				<div class="search-bar">
					<form action="{{url('shop/search/results')}}" method="get" autocomplete="off">
						<input type="text" name="search" class="search search-input" placeholder="חפש באתר" />
						<i class="icon ion-ios-close-outline close-search-bar" aria-hidden="true"></i>
						<button type="submit" name="submit" class="submit-btn">
							<i class="icon ion-android-arrow-back" aria-hidden="true"></i>
						</button>
					</form>
				</div>

				<div class="container">
					<div class="row d-felx justify-content-between align-items-center py-2">

						<div class="site-navigation d-md-block d-flex flex-row justify-content-around">
							<ul>
								<li class="categories btn btn-classic">
									<a href="#">
										<i class="icon ion-navicon"></i>
										תפריט
									</a>
								</li>

								<li>
									<a href="{{url('/')}}">
										<i class="circle-icon icon ion-ios-home mx-0" aria-hidden="true"></i>
									</a>
								</li>

								<li class="pos-rel">
									@if(! Cart::isEmpty() )
									<div class="mycart-amount">{{Cart::getTotalQuantity()}}</div> @endif
									<a href="{{url('shop/checkout')}}">
										<i class="circle-icon icon ion-ios-cart mx-0 mycart" aria-hidden="true"></i>
									</a>
								</li>
								<li class="pos-rel">
									@if(! Wishlist::isEmpty() )
									<div class="wishlist-amount">{{Wishlist::getTotalQuantity()}}</div> @endif
									<a href="{{url('shop/wishlist')}}">
										<i class="circle-icon icon ion-ios-heart mx-0 whishlist" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="circle-icon icon ion-ios-search-strong mx-0 open-search-bar" aria-hidden="true"></i>
									</a>
								</li>
							</ul>

						</div>

						<div class="hidden-md-down text-left">
							<a href="http://shop.epic.co.il">
								<img src="{{ asset('images/epic-logo.png')}}" width="80" />
							</a>
						</div>

					</div>
			</header>



			@include('inc.sm') @include('inc.errors') @yield('content') @if(Session::has('is_admin'))
			<a href="{{url('cms/dashboard')}}" class="btn btn-success go-to-cms">
				<i class="icon ion-log-in"></i> CMS</a>
			@endif

			<footer>
				<div class="container">

					<div class="row">
						<div class="col">
							<ul>

								@if($menu) @foreach($menu as $menu_link)
								<li>
									<a href="{{url($menu_link['url'])}}">{{$menu_link['link']}}</a>
								</li>
								@endforeach @endif

							</ul>
						</div>
						<div class="col">
							<img src="{{asset('images/payment-methods.png')}}" />
						</div>
					</div>
				</div>

			</footer>
			<div class="credit">
				כל הזכויות שמורות ל-
				<?= date("Y"); ?> |
					<a href="http://epic.co.il">Epic</a>&copy;
			</div>

			</div>
		</div>








		<!-- Login Modal -->
		<div class="modal fade" id="login-modal" tabindex="2000" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>


						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#signup" role="tab" data-toggle="tab">הירשם</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#login" role="tab" data-toggle="tab">התחבר</a>
							</li>

						</ul>



					</div>
					<div class="modal-body">



						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="signup">
								<!-- Sign Up Form -->
								<form class="user-in-form" method="POST" action="{{url('user/signup')}}">
									{{ csrf_field()}}
									<label for="name">שם</label>
									<input class="name" type="text" name="name" class="name" value="{{old('name')}}" placeholder="" />
									<br>
									<label for="email">מייל</label>
									<input class="email" type="text" name="email" class="email" value="{{old('email')}}" placeholder="" />
									<br>

									<label for="password">סיסמה</label>
									<div class="input-group">
										<input type="password" class="form-control password signup-password" name="password" value="" placeholder="" />
										<span class="input-group-btn">
											<button class="show-password btn btn-secondary" type="button">
												<i class="eye icon ion-eye" aria-hidden="true"></i>
											</button>
										</span>
									</div>
									<br>
									<label for="password_confirmation">אימות סיסמה</label>
									<div class="input-group">
										<input type="password" class="form-control password signup-password-valid" name="password_confirmation" value="" placeholder=""
										/>
										<span class="input-group-btn">
											<button class="show-password btn btn-secondary" type="button">
												<i class="eye icon ion-eye" aria-hidden="true"></i>
											</button>
										</span>
									</div>
									<br>
									<ul class="password-list">
										<li>
											<p>סיסמה מעל 6 ומתחת ל-10 תווים
												<svg class="checkmark checkmark-length d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
													<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
													<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
												</svg>
											</p>

										</li>
										<li>
											<p>סיסמאות תואמות
												<svg class="checkmark checkmark-match d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
													<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
													<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
												</svg>
											</p>

										</li>
									</ul>
									<!-- <input class="mail_list" type="checkbox" name="mail_list" value="" checked>
                                    <label for="mail_list">אני רוצה לקבל הטבות ומבצעים למייל</label>-->
									<input type="submit" name="submit" value="הירשם" class="submit" />
								</form>


							</div>
							<div role="tabpanel" class="tab-pane" id="login">
								<!-- Login In Form -->
								<form class="user-in-form" method="POST" action="{{url('user/signin')}}">
									{{ csrf_field()}}
									<label for="email">מייל</label>
									<input class="email" type="text" name="email" class="email" value="{{old('email')}}" placeholder="" />
									<br>


									<label for="password">סיסמה</label>
									<div class="input-group">
										<input type="password" class="form-control password login-password" name="password" value="" placeholder="" />
										<span class="input-group-btn">
											<button class="show-password btn btn-secondary" type="button">
												<i class="eye icon ion-eye" aria-hidden="true"></i>
											</button>
										</span>
									</div>



									<input type="submit" name="submit" value="כניסה" class="submit" />
								</form>
								<br>
								<p class="text-center">אפשרויות נוספות</p>
								<br>
								<!--<div class="col-md-6 text-center forgot-password">
                                <a href="#" class="btn btn-secondary">שחכתי שם משתמש או סיסמא</a>
                                </div>-->
								<div class="col-md-12 text-center">
									<a class="btn facebook-login" href="{{url('/redirect')}}" class="btn btn-primary">היכנס באמצעות פייסבוק</a>
								</div>
							</div>
						</div>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">סגור</button>
					</div>
				</div>
			</div>
		</div>




		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		    crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
		    crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
		    crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
		    crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{url('js/product_app.js')}}"></script>
		<script type="text/javascript" src="{{url('js/scripts.js')}}"></script>
</body>

</html>