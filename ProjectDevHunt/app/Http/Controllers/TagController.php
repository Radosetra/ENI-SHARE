<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\PublicationTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return Response::json([
            'data' => $tags
        ]);
    }

    public function create()
    {
        return Response::json([
            'message' => 'Not implemented'
        ], 501);
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->all());

        return Response::json([
            'data' => $tag
        ], 201);
    }

    public function show(Tag $tag)
    {
        $publications = $tag->publications;

        return Response::json([
            'data' => $tag,
            'publications' => $publications
        ]);
    }

    public function edit(Tag $tag)
    {
        return Response::json([
            'message' => 'Not implemented'
        ], 501);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        return Response::json([
            'data' => $tag
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return Response::json([], 204);
    }
}
