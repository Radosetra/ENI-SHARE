<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function index($pub_id)
    {
        // Récupération des commentaires qui correspondent à la publication donnée
        $comments = Comment::where('pub_id', $pub_id)->get();

        // Renvoyer une réponse JSON avec les commentaires récupérés
        return response()->json([
            'success' => true,
            'data' => $comments,
        ]);
    }

    public function store(Request $request)
    {
        // Get data from request
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'pub_id' => 'required',
        ]);

        // Create new comment
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->created_at = now(); // Current date and time
        $comment->user_id = $request->user_id;
        $comment->pub_id = $request->pub_id;

        $comment->save();

        // Return success response with created comment data
        return response()->json($comment, 200);
    }

    public function edit(Request $request, $com_id)
    {
        // Get comment to edit
        $comment = Comment::find($com_id);

        // Check if comment exists
        if (!$comment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Comment not found.'
            ], 404);
        }

        // Check if user has permission to edit comment
        if ($comment->user_id != $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'You are not authorized to edit this comment.'
            ], 403);
        }

        // Update comment content
        $comment->content = $request->input('content');
        $comment->save();

        // Return success response with updated comment data
        return response()->json([
            'status' => 'success',
            'message' => 'Comment updated successfully.',
            'data' => $comment
        ]);
    }

    public function delete(Request $request, $com_id)
    {
        // Get comment to delete
        $comment = Comment::find($com_id);

        // Check if comment exists
        if (!$comment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Comment not found.'
            ], 404);
        }

        // Check if user has permission to delete comment
        if ($comment->user_id != $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'You are not authorized to delete this comment.'
            ], 403);
        }

        // Delete comment
        $comment->delete();

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Comment deleted successfully.'
        ]);
    }
}


