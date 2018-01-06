@extends('layouts.app')

@section('content')

	<div class="jumbotron">
	    <h1>Welcome to SociaBook</h1>
	    <p>Welcome to the Best Interactive Social Media Site. Why not Sign in or Register to get started</p>
	    <p>
	      <a class="btn btn-lg btn-primary " href="{{ route('login') }}" role="button">Sign In</a>
	    </p>
	    <p>Don't have an account? <a href="{{ route('register') }}">Register Now</a></p>
	</div>

@endsection