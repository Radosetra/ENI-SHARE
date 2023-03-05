<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Support\Facades\Validator;
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
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|numeric',
                'post_id' => 'required|numeric'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
            
            $userId = $request->input('user_id');
            $postId = $request->input('post_id');
            $vote = new Vote(); 
            $vote->user_id = $userId;
            $vote->post_id = $postId;
            $vote->save();
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}

