<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($id)
    {
        // Récupérer la publication associée aux commentaires
        $publication = Publication::findOrFail($id);

        // Récupérer tous les commentaires associés à la publication
        $comments = $publication->comments;

        // Retourner une réponse JSON avec la liste des commentaires
        return response()->json(['comments' => $comments]);
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire de commentaire
        $validatedData = $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'pub_id' => 'required',
        ]);

        // Créer un nouveau commentaire
        $comment = Comment::create($validatedData);

        // Retourner une réponse JSON avec l'ID du nouveau commentaire
        return response()->json(['comment_id' => $comment->id]);
    }
}
