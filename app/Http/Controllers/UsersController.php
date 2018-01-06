<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index() 
    {
    	$users = User::orderBy('username', 'asc')->paginate(50);

    	return view('users.index', ['users' => $users]);
    }

    public function show($username) 
    {
		$user = User::with('followers')->with('statuses')->where('username', $username)->first();

		if(!$user){
			return redirect('/');
		}

		return view('users.show', ['user' => $user]);
    }
}
