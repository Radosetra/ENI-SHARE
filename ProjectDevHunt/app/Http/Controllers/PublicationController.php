<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    
    public function index()
    {
        $publications = Publication::all();
        return response()->json($publications,200);
    }

    public function create()
    {
        // Any route
    }

    // enregistrer une nouvelle publication
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $publication = new Publication;
        $publication->title = $request->title;
        $publication->description = $request->description;

        $publication->user_id = auth()->user()->id; // ou le ID de l'utilisateur connecté

        $publication->save();

        return response()->json($publication,200);
    }

    // afficher une publication spécifique
    public function show($id)
    {
        $publication = Publication::find($id);
        return response()->json($publication,200);
    }

    // Recherche par tag,auteur,titre
    public function search(Request $request)
    {
        $query = $request->input('query');
        $publications = Publication::where('title', 'LIKE', '%'.$query.'%')//
            ->orWhereHas('tags', function($q) use ($query) {
                $q->where('nom', 'LIKE', '%'.$query.'%');
            })
            ->orWhereHas('user', function($q) use ($query) {
                $q->where('nom', 'LIKE', '%'.$query.'%');
            })
            ->get();

        return response()->json($publications,200);
    }


    // afficher un formulaire pour éditer une publication existante
    public function edit($id)
    {
        $publication = Publication::find($id);
        return view('publications.edit', compact('publication'));
    }

    // mettre à jour une publication existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $publication = Publication::find($id);
        $publication->title = $request->title;
        $publication->description = $request->description;

        $publication->save();

        return response()->json($publication,200);
    }

    // supprimer une publication existante
    public function destroy($id)
    {
        $publication = Publication::find($id);
        $publication->delete();

        return response()->json('Delete successfully',200);
    }
    
}
