@extends('layouts.app')

@section('content') 

	<div class="row" style="clear: both;">
		<div class="col-md-3">
		
			<div class="media" style="border:1px solid #3097d1; border-radius: 10px; padding: 5px;">
                <div class="media-left">
	                <img class="media-object" src="images/avatar.png" style="width:70px; border-radius: 50%" alt="{{ $user->username }}">
                </div>
                <div class="media-body">
                  <h4>{{ $user->username }}</h4>
                  <h5><strong>Fullname: </strong> {{ $user->name }}</h5>
                  <p class="text-muted">{{ $statusCount = $user->statuses->count() }} {{ str_plural('Status', $statusCount) }}</p>
                  <p class="text-muted">{{ $followersCount = $user->followers->count() }} {{ str_plural('Follower', $followersCount) }}</p>
                </div>
				
				@if(Auth::user())
					@if($user->isFollowedBy(Auth::user()))
						<p>You are following {{ $user->username }}</p>

						@include('partials.follow.unfollowform')

					@elseif($user->id == Auth::user()->id)
						
					@else
						
						@include('partials.follow.followform')

	                @endif
	              @endif

                <div class="row">
                	<div class="col-md-10">
                		<h4>Followers</h4>
                		<ul>
	                		@foreach($user->followers as $follower)
								<li>{{ $follower->username }}</li>
	                		@endforeach
	                	</ul>
                	</div>
                </div>
             </div>

		</div>
		<div class="col-md-6">
			@if(Auth::user())
				@if($user->is(Auth::user()))
					@include('partials.status.form')
				@endif
			@endif

			@if(!$user->statuses->count())
				<h4 class="text-center">This User hasn't created any status yet!</h4>
			@endif
				@include('partials.status.statuses', ['statuses' => $user->statuses])
			
		</div>
	</div>


@endsection