<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Status;
use App\Comment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // array of ids of followed users by current user
    protected $idsOfFollowedUsers = [];

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function is($user) 
    {
        return $this->username == $user->username;
    }

    // get a list of users that the current user follows
    public function followedUsers()
    {
        return $this->belongsToMany(self::class, 'follows', 'follower_id', 'followed_id')
                                    ->withTimestamps();
    }

    // get a list of users who follow the current user
    public function followers()
    {
        return $this->belongsToMany(self::class, 'follows', 'followed_id', 'follower_id')
                                    ->withTimestamps();
    }

    //get a list of users who comment on a status
    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function isFollowedBy(User $otherUser) 
    {
        $idsWhoOtherUserFollows = [];
        foreach ($otherUser->followedUsers as $follow) 
        {
            $idsWhoOtherUserFollows[] = $follow->pivot->followed_id;
        }

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

    public function getIdsOfFollowedUsers() 
    {
        foreach ($this->followedUsers as $follow) 
        {
            $this->idsOfFollowedUsers[] = $follow->pivot->followed_id;
        }

        return $this->idsOfFollowedUsers;
    }



}
