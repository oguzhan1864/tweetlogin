<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Dotenv\Regex\Result;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    //function show() {
    //    $tweets = DB::table('tweets')->get();
    //    return view('profile', ['tweets' => $tweets]);
    //}

    function show() {
        $tweets = DB::table('tweets')->get();
        if(Auth::check()) {
                $result = \App\Tweet::all();
            return view('profile', ['tweets' => $result]);
        } else {
            return view('profile');
        }
    }

    function validateNewTweet(Request $request) {
        if(Auth::check()) {
            $tweet = new \App\Tweet;
            $tweet->author = $request->author;
            $tweet->content = $request->content;
            $tweet->save();

        $result = \App\Tweet::all();
            return view('profile', ['tweets' => $result]);
        } else {
            return view('profile');
        }

    }



    // function showTweet($id) {
        // $tweets = DB::table('tweets')->get();
        // if($id > sizeOf($tweets)) {
        //    return view("tweetError");
        // }
        // return view("showTweets", [ "allTweets" => [$tweets[$id]]]);
    //}

    //function addTweet(Request $request) {
    //    DB::insert("INSERT INTO tweet (author, content)
    //    VALUES ('$request->author','$request->content');");
    //    $tweets = DB::table('tweets')->get();
    //    return view("showTweets", [ "allTweets" => $tweets]);
    // }

    // function deleteTweet(Request $request) {
    //    DB::delete("DELETE FROM tweet WHERE id=$request->id");
    //    $tweets = DB::table('tweets')->get();
    //    return view("showTweets", [ "allTweets" => $tweets]);
    //}
}
