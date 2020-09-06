<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Requests\StoreGenre;
use App\Http\Resources\Genre as ResourcesGenre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        return response()->json(
            [
                'data' => ResourcesGenre::collection(Genre::all()),
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenre $request) : JsonResponse
    {
        $genre = Genre::create($request->all());

        return response()->json(
            new ResourcesGenre($genre),
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre) : JsonResponse
    {
        return response()->json(
            new ResourcesGenre($genre),
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGenre $request, Genre $genre) : JsonResponse
    {
        $genre->update($request->all());

        return response()->json(
            new ResourcesGenre($genre),
            Response::HTTP_CREATED
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre) : JsonResponse
    {
        $genre->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
