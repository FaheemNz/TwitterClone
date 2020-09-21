<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Tweet;

class TweetController extends Controller
{
    
    public function index()
    {
        $tweets = auth()->user()->getTimeline();
        return view('tweets.index', compact('tweets'));
    }
    
    public function store(TweetRequest $tweetRequest)
    {
        $tweet = $tweetRequest->validated();
        
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $tweet['body']
        ]);

        return redirect('/tweets');
    }
}
