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
        // Validation des données du formulaire de commentaire
        $validator = Validator::make($request->all(), [
            'pub_id' => 'required|integer',
            'content' => 'required|string|max:255',
        ]);

        // Si la validation échoue, renvoyer une réponse JSON d'erreur
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Création d'un nouveau commentaire avec les données validées
        $comment = new Comment;
        $comment->user_id = Auth::id(); // Obtention de l'ID de l'utilisateur connecté
        $comment->pub_id = $request->input('pub_id');
        $comment->content = $request->input('content');
        $comment->save();

        // Renvoyer une réponse JSON avec les détails du commentaire créé
        return response()->json([
            'success' => true,
            'message' => 'Commentaire créé avec succès',
            'data' => $comment,
        ], 201);
    }
}
