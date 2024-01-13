<?php

namespace App\Http\Controllers;

use App\Models\Sponsors;
use App\Models\Tweets;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    // get all Tweets
    public function index()
    {
        $tweets = Tweets::all();

        return response()->json($tweets);
    }

    //get by id Tweets
    public function show($id)
    {
        $tweet = Tweets::find($id);

        if (!$tweet) {
            return response()->json(['message' => 'Tweet not found'], 404);
        }

        return response()->json($tweet);
    }

    // delete Tweets
    public function deleteTweets(Request $request,$id)
    {
        $tweet = Tweets::find($id);

        if (is_null($tweet)) {
            return response()->json(['message' => 'Tweet not found'], 404);
        }

        $tweet->delete();
        return response()->json(['message' => 'tweet deleted successfully']);
    }
// create Tweets
    public function create(Request $request)
    {
        $tweets= Tweets::create($request->all());
        return response($tweets,201);

    }

// update tweets
    public function updateTweets(Request $request,$id){
        $tweets= Tweets::find($id);
        if(is_null($tweets)){
            return response()->json(['message' => 'Tweets not fond'],404);
        }
        $tweets->update($request->all());
        return response($tweets,200);
    }


}

