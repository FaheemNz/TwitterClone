<?php

namespace App\Traits;

trait Likeable
{

    public function scopeWithLikes($query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function like($user = null, bool $liked = true)
    {
        return $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'liked' => $liked
        ]);
    }

    public function dislike($user)
    {
        return $this->like($user, false);
    }

    public function isLikedBy($user, $liked = true)
    {
        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', $liked)
            ->count();
    }

    public function isDislikedBy($user)
    {
        return $this->isLikedBy($user, false);
    }

    // Relationship
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
