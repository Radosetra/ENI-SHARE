<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();

        return response()->json($skills);
    }

    public function show(Skill $skill)
    {
        return response()->json($skill);
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|unique:skills|max:255',
        ]);

        $skill = Skill::create([
            'libelle' => $request->input('libelle'),
        ]);

        return response()->json($skill, 201);
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'libelle' => 'required|unique:skills|max:255',
        ]);

        $skill->update([
            'libelle' => $request->input('libelle'),
        ]);

        return response()->json($skill);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return response()->json(null, 204);
    }
}

