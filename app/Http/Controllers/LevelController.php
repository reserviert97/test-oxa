<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    public function index()
    {

        $levels = Level::all();
        return response()->json([
            'message' => 'data retrieved successfully',
            'data' => $levels
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'level' => 'required|numeric',
            'minimum_generated'  => 'required|numeric',
        ]);

        $level = new Level();
        $level->level = $request->input('level');
        $level->minimum_generated = $request->input('minimum_generated');
        $level->save();

        return response()->json([
            'message' => 'data successfully inserted',
            'new_level' => $level
        ], 201);
    }

    public function show($levelId)
    {
        $level = Level::findOrFail($levelId);
        return response()->json([
            'message' => 'data retrieved successfully',
            'level' => $level
        ], 200);
    }

    public function update(Request $request, $levelId)
    {
        $this->validate($request, [
            'level' => 'required|numeric',
            'minimum_generated' => 'required|numeric',
        ]);

        $level = Level::findOrFail($levelId);
        $level->update($request->input());
        return response()->json([
            'message' => 'data updated successfully',
            'updated_level' => $level
        ], 201);
    }

    public function delete($levelId)
    {
        $level = Level::findOrFail($levelId);
        $level->delete();
        return response()->json([
            'message' => 'data has been deleted successfully',
            'deleted_level' => $level
        ], 201);
    }
}
