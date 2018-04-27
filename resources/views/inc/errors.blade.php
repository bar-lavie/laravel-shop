@if ($errors && $errors->any())
<div class="row" id="sm-box">
	<div class="col-md-12">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif