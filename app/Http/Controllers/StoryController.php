<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryStoreRequest;
use App\Http\Requests\StoryUpdateRequest;
use App\Http\Resources\StoryCollection;
use App\Http\Resources\StoryResource;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $stories = Story::all();

        return new StoryCollection($stories);
    }

    public function store(StoryStoreRequest $request)
    {
        $story = Story::create($request->validated());

        return new StoryResource($story);
    }

    public function show(Request $request, Story $story)
    {
        return new StoryResource($story);
    }

    public function update(StoryUpdateRequest $request, Story $story)
    {
        $story->update($request->validated());

        return new StoryResource($story);
    }

    public function destroy(Request $request, Story $story)
    {
        $story->delete();

        return response()->noContent();
    }
}
