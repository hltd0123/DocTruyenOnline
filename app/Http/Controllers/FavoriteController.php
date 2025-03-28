<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteStoreRequest;
use App\Http\Requests\FavoriteUpdateRequest;
use App\Http\Resources\FavoriteCollection;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $favorites = Favorite::all();

        return new FavoriteCollection($favorites);
    }

    public function store(FavoriteStoreRequest $request)
    {
        $favorite = Favorite::create($request->validated());

        return new FavoriteResource($favorite);
    }

    public function show(Request $request, Favorite $favorite)
    {
        return new FavoriteResource($favorite);
    }

    public function update(FavoriteUpdateRequest $request, Favorite $favorite)
    {
        $favorite->update($request->validated());

        return new FavoriteResource($favorite);
    }

    public function destroy(Request $request, Favorite $favorite)
    {
        $favorite->delete();

        return response()->noContent();
    }
}
