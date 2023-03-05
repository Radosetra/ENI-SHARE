<?php

namespace App\Http\Controllers;

use App\Models\Publication_tag;
use Illuminate\Http\Request;

class PublicationTagController extends Controller
{
    public function index()
    {
        $publication_tags = Publication_tag::all();

        return view('publication_tags.index', compact('publication_tags'));
    }

    public function create()
    {
        return view('publication_tags.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pub_id' => 'required|numeric',
            'tag_id' => 'required|numeric',
        ]);

        Publication_tag::create($validatedData);

        return redirect()->route('publication_tags.index')->with('success', 'Publication tag created successfully.');
    }

    public function edit(Publication_tag $publication_tag)
    {
        return view('publication_tags.edit', compact('publication_tag'));
    }

    public function update(Request $request, Publication_tag $publication_tag)
    {
        $validatedData = $request->validate([
            'pub_id' => 'required|numeric',
            'tag_id' => 'required|numeric',
        ]);

        $publication_tag->update($validatedData);

        return redirect()->route('publication_tags.index')->with('success', 'Publication tag updated successfully.');
    }

    public function destroy(Publication_tag $publication_tag)
    {
        $publication_tag->delete();

        return redirect()->route('publication_tags.index')->with('success', 'Publication tag deleted successfully.');
    }
}
