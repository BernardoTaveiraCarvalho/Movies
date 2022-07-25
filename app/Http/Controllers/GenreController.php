<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Genre::all(), 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function show(Genre $genre)
    {
        try {
            return response()->json($genre, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $todo = Genre::create($request->all());
            return response()->json($todo, 201);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function update(Request $request,Genre $genre)
    {
        try {
            $genre->update($request->all());
            return response()->json($genre, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function destroy(Genre $genre)
    {
        try {
            $genre->delete();
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }



}
