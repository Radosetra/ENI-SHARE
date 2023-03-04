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

        // Afficher la vue avec la liste des commentaires
        return view('comments.index', compact('comments'));
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

        // Rediriger vers la page de la publication associée aux commentaires
        return redirect()->route('publications.show', $comment->pub_id);
    }
}


