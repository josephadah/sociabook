<div class="row">
	<div class="col-md-6 col-md-offset-3">
		
		@if (Session::has('success'))

			<div class="alert alert-success" role="alert">
				{{ Session::get('success') }}
			</div>

		@endif

		@if (Session::has('primary'))

			<div class="alert alert-info" role="alert">
				{{ Session::get('primary') }}
			</div>

		@endif

		@if (count($errors) > 0)

			<div class="alert alert-danger" role="alert">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul
			</div>

		@endif

	</div>
</div>
