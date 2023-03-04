<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index($postId)
    {
        $votes = Vote::where('pub_id', $postId)->count();
        
        return response()->json(['votes' => $votes]);
    }
    //
    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $postId = $request->input('post_id');
        $vote = new Vote(); 
        $vote->user_id = $userId;
        $vote->post_id = $postId;
        $vote->save();
        return response()->json(['success' => true]);
    }
}

