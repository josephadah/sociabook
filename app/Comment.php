<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;
use App\User;

class Comment extends Model
{
    protected $fillable = ['body'];

    public function status() 
    {
    	return $this->belongsTo(Status::class);
    }

    public function commenter() 
    {
    	return $this->belongsTo(User::class, 'commenter_id');
    }

}
