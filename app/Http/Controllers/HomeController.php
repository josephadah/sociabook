<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $idsOfFollowedUsers = $user->getIdsOfFollowedUsers();
        $idsOfFollowedUsers[] = $user->id;
        $statuses = Status::with('comments')->whereIn('user_id', $idsOfFollowedUsers)->latest()->get();

        return view('/home', ['statuses' => $statuses]);
    }
}
