@if(Session::has('sm'))
<div class="row" id="sm-box">
	<div class="col-md-12">
		<div class="alert alert-success mt-3" role="alert">
			{!! Session::get('sm') !!}
		</div>
	</div>
</div>
@endif @if(Session::has('sm-info'))
<div class="row" id="sm-box">
	<div class="col-md-12">
		<div class="alert alert-info mt-3" role="alert">
			{!! Session::get('sm-info') !!}
		</div>
	</div>
</div>
@endif