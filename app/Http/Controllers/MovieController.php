<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MovieController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Movie::with(['genres','actors'])->get(), 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function show(Movie $movie)
    {
        try {
            return response()->json($movie->load('actors','genres'), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function store(Request $request)
    {
        try {

                $movie->actors()->sync($request->actors);
                $movie->genres()->sync($request->genres);
            $movie = Movie::create($request->all());
            return response()->json($movie->load('actors','genres'), 201);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function update(Request $request, Movie $movie)
    {
        try {
            $movie->update($request->all());
            $movie->actors()->sync($request->actors);
            $movie->genres()->sync($request->genres);
            return response()->json($movie->load('actors','genres'), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function destroy(Movie $movie)
    {
        try {
            $movie->actors()->sync([]);
            $movie->genres()->sync([]);
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }



}
