<?php

namespace App\Http\Controllers;

use App\Models\Tweets;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweets::all();

        return response()->json($tweets);
    }

    public function store(Request $request)
    {
        $tweet=  Tweets::create($request->all());
        return response($tweet,201);
    }
    public function show($id)
    {
        $tweet = Tweets::find($id);

        if (!$tweet) {
            return response()->json(['message' => 'Tweet not found'], 404);
        }

        return response()->json($tweet);
    }
    public function destroy($id)
    {
        $tweet = Tweets::find($id);

        if (!$tweet) {
            return response()->json(['message' => 'tweet not found'], 404);
        }

        $tweet->delete();

        return response()->json(['message' => 'tweet deleted successfully']);
    }



}

