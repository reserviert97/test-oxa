<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $data = Todo::all();
        return response()->json([
            'message' => 'data fetced successfully',
            'status' => 200,
            'data' => $data
        ], 200);
    }

    public function show($id){
        $data = Todo::where('id',$id)->get();
        return response()->json([
            'message' => 'data fetced successfully',
            'status' => 200,
            'data' => $data
        ], 200);
    }

    public function store (Request $request){
        $data = new Todo();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();
    
        return response('Berhasil Tambah Data');
    }
}
