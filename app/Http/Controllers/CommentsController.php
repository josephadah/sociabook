<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        	'body' => 'required|string|max:500'
        ]);

        $comment = new Comment;

        $comment->commenter_id = Auth::user()->id;
        $comment->status_id = $request->statusId;
        $comment->body = $request->body;

        $comment->save();

        return redirect()->back();
        
    }

}
