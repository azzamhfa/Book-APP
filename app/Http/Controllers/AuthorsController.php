<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use App\Http\Controllers\ModelNotFoundException;

class AuthorsController extends Controller
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
    public function index()
    {
        return Authors::all();
    }

    public function indexById($id)
    {
        $authorss = Authors::find($id);
        if (!$authorss) {
            return response()->json(['message' => 'authors Not Found']);
        }
        return $authorss;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'biography' => 'required'
        ]);

        $authors = authors::create(
            $request->only(['name', 'gender', 'biography'])
        );

        return response()->json([
            'created' => true,
            'data' => $authors
        ], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $authors = Authors::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'authors not found'
            ], 404);
        }

        $authors->fill(
            $request->only(['name', 'gender', 'biography'])
        );
        $authors->save();

        return response()->json([
            'updated' => true,
            'data' => $authors
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $authors = Authors::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'authors not found'
                ]
            ], 404);
        }

        $authors->delete();

        return response()->json([
            'deleted' => true
        ], 200);
    }

    //
}
