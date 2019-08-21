<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
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

}
