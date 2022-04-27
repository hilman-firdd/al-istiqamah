@if ($message = Session::get('success'))
<div class="callout callout-success">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif
@if ($errors->any())
	
		@foreach ($errors->all() as $error)
		<div class="callout callout-warning">
			<button type="button" class="close input-group-sm" data-dismiss="alert">×</button>	
			<strong>{{ $error }}</strong>
		</div>
		@endforeach


@endif



@if ($message = Session::get('warning'))
<div class="callout callout-warning">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="callout callout-info">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

