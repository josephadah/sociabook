<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to sociabook</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Welcome to Sociabook, {{ $user->username }}</h1>
				<hr>
				<a class="btn btn-primary btn-block" href="{{ route('users.profile', $user->username) }}">Click Here To Post Status and Follow Others</a>
			</div>
		</div>
	</div>
	
</body>
</html>