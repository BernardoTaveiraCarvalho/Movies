<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{

    public function index()
    {
        try {
            return response()->json(Actor::all(), 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function show(Actor $actor)
    {
        try {
            return response()->json($actor, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $todo = Actor::create($request->all());
            return response()->json($todo, 201);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function update(Request $request, Actor $actor)
    {
        try {
            $actor->update($request->all());
            return response()->json($actor, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function destroy(Actor $actor)
    {
        try {
            $actor->delete();
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }



}
