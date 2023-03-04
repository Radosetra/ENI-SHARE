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

        // Afficher la vue avec la liste des publications
        return view('publications.index', compact('publications'));
    }

    public function show($id)
    {
        // Récupérer la publication correspondant à l'identifiant $id
        $publication = Publication::findOrFail($id);

        // Récupérer tous les commentaires associés à la publication
        $comments = $publication->answers;

        // Afficher la vue avec les détails de la publication et la liste des commentaires
        return view('publications.show', compact('publication', 'comments'));
    }

}
