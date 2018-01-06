<form method="POST" action="{{ route('follows.store') }}">
	{{ csrf_field() }}
	<input type="hidden" name="userIdToFollow" value="{{ $user->id }}">
	<button type="submit" class="btn btn-primary btn-xs text-center">Follow {{ $user->username }}</button>
</form>