<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
    public function vote(Request $request)
    {
        $userId = $request->input('user_id');
        $postId = $request->input('post_id');
        
        $vote = new Vote();
        $vote->user_id = $userId;
        $vote->post_id = $postId;
        $vote->save();
        
        return response()->json(['success' => true]);
    }

    public function getVotes($postId)
    {
        $votes = Vote::where('post_id', $postId)->count();
        
        return response()->json(['votes' => $votes]);
    }

}
