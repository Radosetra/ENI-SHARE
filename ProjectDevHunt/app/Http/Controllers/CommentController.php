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

    public function create(Request $request)
    {
        // Get data from form
        $content = $request->input('content');
        $user_id = $request->input('user_id');
        $pub_id = $request->input('pub_id');

        // Create new comment
        $comment = new Comment;
        $comment->content = $content;
        $comment->comment_date = now(); // Current date and time
        $comment->user_id = $user_id;
        $comment->pub_id = $pub_id;
        $comment->save();

        // Redirect to corresponding article page
        return redirect('/publications/' . $pub_id);
    }

    // public function edit(Request $request, $com_id)
    // {
    //     // Get comment to edit
    //     $comment = Comment::find($com_id);

    //     // Check if comment exists
    //     if (!$comment) {
    //         abort(404);
    //     }

    //     // Check if user has permission to edit comment
    //     if ($comment->user_id != $request->user()->id) {
    //         abort(403, 'You are not authorized to edit this comment.');
    //     }

    //     // Update comment content
    //     $comment->content = $request->input('content');
    //     $comment->save();

    //     // Redirect to corresponding article page
    //     return redirect('/publications/' . $comment->pub_id);
    // }

    // public function delete(Request $request, $com_id)
    // {
    //     // Get comment to delete
    //     $comment = Comment::find($com_id);

    //     // Check if comment exists
    //     if (!$comment) {
    //         abort(404);
    //     }

    //     // Check if user has permission to delete comment
    //     if ($comment->user_id != $request->user()->id) {
    //         abort(403, 'You are not authorized to delete this comment.');
    //     }

    //     // Delete comment
    //     $comment->delete();

    //     // Redirect to corresponding article page
    //     return redirect('/publications/' . $comment->article_id);
    // }
}

