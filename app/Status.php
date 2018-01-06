<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Status extends Model
{
    protected $fillable = [
    	'body'
    ];

    public function user() 
    {
    	return $this->belongsTo(User::class)->latest();
    }

    public function comments() 
    {
    	return $this->hasMany(Comment::class)->latest();
    }
}
