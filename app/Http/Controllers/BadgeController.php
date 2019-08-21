<?php

namespace App\Http\Controllers;

use App\Badge;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class BadgeController extends Controller
{

    public function index(){
        
        $badges = Badge::all();
        return response()->json([
            'message' => 'data retrieved successfully',
            'data' => $badges
        ], 200);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'description'     => 'required|min:5',
            'minimum_level'  => 'required|numeric',
        ]);

        $badge = new Badge();
        $badge->name = $request->input('name');
        $badge->description = $request->input('description');
        $badge->minimum_level = $request->input('minimum_level');
        $badge->save();

        return response()->json([
            'message' => 'data successfully inserted',
            'new_badge' => $badge
        ], 201);
    }

    public function show($badgeId)
    {
        $badge = Badge::findOrFail($badgeId);
        return response()->json([
            'message' => 'data retrieved successfully',
            'badge' => $badge
        ], 200);
    }

    public function update(Request $request, $badgeId)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'description'     => 'required|min:5',
            'minimum_level'  => 'required|numeric',
        ]);

        $badge = Badge::findOrFail($badgeId);
        $badge->update($request->input());
        return response()->json([
            'message' => 'data updated successfully',
            'updated_badge' => $badge
        ], 201);
    }

    public function delete($badgeId)
    {
        $badge = Badge::findOrFail($badgeId);
        $badge->delete();
        return response()->json([
            'message' => 'data has been deleted successfully',
            'deleted_badge' => $badge
        ], 201);
    }
}
