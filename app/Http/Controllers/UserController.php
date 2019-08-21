<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Level;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        
        $badges = User::all();
        return response()->json([
            'message' => 'data retrieved successfully',
            'data' => $badges
        ], 200);

    }

    public function show($userId)
    {
        $user = User::findOrFail($userId);
        $user->detail->level;
        $user->detail->badge;
        return response()->json([
            'message' => 'data retrieved successfully',
            'user' => $user
        ], 200);
    }

    public function update(Request $request, $userId)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::findOrFail($userId);
        $user->update($request->input());
        return response()->json([
            'message' => 'data updated successfully',
            'updated_user' => $user
        ], 201);
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return response()->json([
            'message' => 'data has been deleted successfully',
            'deleted_user' => $user
        ], 201);
    }

    public function generate(Request $request)
    {
        /* cek total generate user */
        $total_generate = $request->auth->detail->total_generated;

        /* cek level user */
        $user_level = $request->auth->detail->level;

        /* cek badge user */
        $user_badge = $request->auth->detail->badge;

        $total_generate += 1;

        /* get all level */
        $levels = Level::all();

        /* change user level by total_generated */
        foreach ($levels as $level) {
            if ($total_generate >= $level['minimum_generated']) {
                $user_level = $level;
            }
        }

        /* get all badge */
        $badges = Badge::all();

        /* change user badge by user_level */
        foreach ($badges as $badge) {
            if ($user_level['level'] >= $badge['minimum_level']) {
                $user_badge = $badge;
            }
        }

        /* saving to database */
        $user = User::findOrFail($request->auth->id);
        $user->detail->total_generated = $total_generate;
        $user->detail->level_id = $user_level['id'];
        $user->detail->badge_id = $user_badge['id'];
        $user->detail->save();
        $user->detail->level;
        $user->detail->badge;

        return response()->json([
            'status' => 'user data successfully updated',
            'updated_data' => $request->auth
        ], 201);
      
    }

}
