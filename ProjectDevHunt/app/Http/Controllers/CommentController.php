<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($pub_id)
    {
        // Retrieve the publication with the specified ID
        $publication = Publication::find($pub_id);

        if (!$publication) {
            // If the publication doesn't exist, return an error message
            return response()->json(['error' => 'Publication not found'], 404);
        }

        // Retrieve all comments associated with the publication
        $comments = $publication->comments;

        // Return the comments as JSON
        return response()->json(['comments' => $comments]);
    }

    public function store(Request $request)
    {
        // Validate the comment data from the form
        $validatedData = $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'pub_id' => 'required',
        ]);

        // Create a new comment
        $comment = Comment::create($validatedData);

        // Return the new comment's ID as JSON
        return response()->json(['comment_id' => $comment->com_id]);
    }
}
