<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Dotenv\Regex\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TweetController extends Controller
{
    function show() {
        $tweets = DB::table('tweets')->get();
        if(Auth::check()) {
                $result = \App\Tweet::all();
            return view('showTweets', ['tweets' => $result]);
        } else {
            return view('showTweets');
        }
    }

    function validateNewTweet(Request $request) {
        if(Auth::check()) {
            $tweet = new \App\Tweet;
            $tweet->author = $request->author;
            $tweet->content = $request->content;
            $tweet->save();

        $result = \App\Tweet::all();
            return view('showTweets', ['tweets' => $result]);
        } else {
            return view('showTweets');
        }
    }

     function showTweet($id) {
         $tweets = DB::table('tweets')->get();
         if($id > sizeOf($tweets)) {
            return view('showTweets');
         }
         return view('showTweets', [ 'tweets' => [$tweets[$id]]]);
    }

    //function addTweet(Request $request) {
    //    DB::insert("INSERT INTO tweet (author, content) VALUES ('$request->author','$request->content')");
    //    $tweets = DB::table('tweets')->get();
    //    return view('showTweets', [ 'tweets' => $tweets]);
    // }

    public function addTweet(Request $request) {
        $tweet = new \App\Tweet;
        $tweet->author = $request->author;
        $tweet->content = $request->content;
        $tweet->save();

        $result = \App\Tweet::all();
            return view('showTweets', ['tweets' => $result]);
        }


    function deleteTweet(Request $request) {
        DB::delete("DELETE FROM tweet WHERE id=$request->id");
        $tweets = DB::table('tweets')->get();
        return view('showTweets', [ 'tweets' => $tweets]);
     }

    function showUser() {
        if(Auth::check()) {
            $users =\App\User::all();
            $follows = \App\Follows::where('following', Auth::user()->name)->get();
            return view('showUser', ['users' => $users, 'follows' => $follows]);
        } else {
            return redirect('/home');
        }

     }
}
