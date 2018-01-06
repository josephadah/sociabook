<form method="POST" action="{{ route('follows.destroy', $user->id) }}">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	<input type="hidden" name="userIdToUnfollow" value="{{ $user->id }}">
	<button type="submit" class="btn btn-danger btn-xs text-center">Unfollow {{ $user->username }}</button>
</form>