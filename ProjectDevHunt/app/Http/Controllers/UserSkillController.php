<?php

namespace App\Http\Controllers;

use App\Models\UserSkill;
use Illuminate\Http\Request;

class UserSkillController extends Controller
{
    public function index()
    {
        $userSkills = UserSkill::all();

        return response()->json($userSkills);
    }

    public function show(UserSkill $userSkill)
    {
        return response()->json($userSkill);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'skill_id' => 'required|exists:skills,skill_id',
        ]);

        $userSkill = UserSkill::create([
            'user_id' => $request->input('user_id'),
            'skill_id' => $request->input('skill_id'),
        ]);

        return response()->json($userSkill, 201);
    }

    public function update(Request $request, UserSkill $userSkill)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'skill_id' => 'required|exists:skills,skill_id',
        ]);

        $userSkill->update([
            'user_id' => $request->input('user_id'),
            'skill_id' => $request->input('skill_id'),
        ]);

        return response()->json($userSkill);
    }

    public function destroy(UserSkill $userSkill)
    {
        $userSkill->delete();

        return response()->json(null, 204);
    }
}