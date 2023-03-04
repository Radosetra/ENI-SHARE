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

    
}

