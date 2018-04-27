<!DOCTYPE html>
<html lang="he">

<head>
	<meta charset="UTF-8">
	<title>Epic | CMS</title>
	<!-- Mobile Specific Meta Tag-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#222">
	<!-- css links -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css">
	<link rel="stylesheet" href="{{url('css/style.css')}}">
	<!-- google analytics -->

	<!-- Base Url -->
	<script>
		var BASE_URL = "{{url('')}}/"
	</script>
</head>

<body id="cms">




	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				 aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('cms/dashboard')}}">Epic | מערכת ניהול</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a target="_blank" href="{{url('')}}">חזרה לאתר</a>
					</li>
					<li>
						<a href="{{url('user/logout')}}">התנתקות</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<div class="overlay-light"></div>
				<ul class="nav nav-sidebar">
					<li>
						<a href="{{url('cms/dashboard')}}">לוח ראשי</a>
					</li>
					<li>
						<a href="{{url('cms/menu')}}">תפריט</a>
					</li>
					<li>
						<a href="{{url('cms/content')}}">תוכן</a>
					</li>
					<li>
						<a href="{{url('cms/categories')}}">קטגוריות</a>
					</li>
					<li>
						<a href="{{url('cms/products')}}">מוצרים</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


				@include('inc.sm') @include('inc.errors') @yield('cms_content')



			</div>



		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
	 crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
	 crossorigin="anonymous"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
	<script type="text/javascript" src="{{url('js/summernot_ext.js')}}"></script>
	<script type="text/javascript" src="{{url('js/cms_scripts.js')}}"></script>
</body>

</html>