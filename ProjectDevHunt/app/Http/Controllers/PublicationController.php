<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        // Récupérer toutes les publications
        $publications = Publication::all();

        // Renvoyer les données au format JSON
        return response()->json([
            'publications' => $publications
        ]);
    }

    public function show($id)
    {
        // Récupérer la publication correspondant à l'identifiant $id
        $publication = Publication::findOrFail($id);

        // Récupérer tous les commentaires associés à la publication
        $comments = $publication->answers;

        // Renvoyer les données au format JSON
        return response()->json([
            'publication' => $publication,
            'comments' => $comments
        ]);
    }
}
