@extends('layouts.app')

@section('content')

	<div class="row">
		<h2 class="text-center">All Users</h2>
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				@foreach($users as $user)
					<div class="col-md-2" style="height: 50px; padding: 5px; margin: 5px; border: 1px solid #aaa;">
						<a href="{{ route('users.profile', $user->username) }}">
							
						<img class="img-circle" src="images/avatar.png" style="width:40px; border-radius: 50%" alt="{{ $user->username }}">

						{{ $user->username }}
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection