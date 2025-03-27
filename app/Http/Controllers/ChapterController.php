<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterStoreRequest;
use App\Http\Requests\ChapterUpdateRequest;
use App\Http\Resources\ChapterCollection;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChapterController extends Controller
{
    public function index(Request $request): Response
    {
        $chapters = Chapter::all();

        return new ChapterCollection($chapters);
    }

    public function store(ChapterStoreRequest $request): Response
    {
        $chapter = Chapter::create($request->validated());

        return new ChapterResource($chapter);
    }

    public function show(Request $request, Chapter $chapter): Response
    {
        return new ChapterResource($chapter);
    }

    public function update(ChapterUpdateRequest $request, Chapter $chapter): Response
    {
        $chapter->update($request->validated());

        return new ChapterResource($chapter);
    }

    public function destroy(Request $request, Chapter $chapter): Response
    {
        $chapter->delete();

        return response()->noContent();
    }
}
