<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Chapter;
use App\Models\ChapterId;
use App\Models\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ChapterController
 */
final class ChapterControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $chapters = Chapter::factory()->count(3)->create();

        $response = $this->get(route('chapters.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ChapterController::class,
            'store',
            \App\Http\Requests\ChapterStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $chapterId = ChapterId::factory()->create();
        $chapterTitle = fake()->word();
        $content = fake()->paragraphs(3, true);
        $chapterNumber = fake()->numberBetween(-10000, 10000);
        $status = fake()->numberBetween(-10000, 10000);
        $story = Story::factory()->create();

        $response = $this->post(route('chapters.store'), [
            'chapterId' => $chapterId->id,
            'chapterTitle' => $chapterTitle,
            'content' => $content,
            'chapterNumber' => $chapterNumber,
            'status' => $status,
            'story_id' => $story->id,
        ]);

        $chapters = Chapter::query()
            ->where('chapterId', $chapterId->id)
            ->where('chapterTitle', $chapterTitle)
            ->where('content', $content)
            ->where('chapterNumber', $chapterNumber)
            ->where('status', $status)
            ->where('story_id', $story->id)
            ->get();
        $this->assertCount(1, $chapters);
        $chapter = $chapters->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $chapter = Chapter::factory()->create();

        $response = $this->get(route('chapters.show', $chapter));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ChapterController::class,
            'update',
            \App\Http\Requests\ChapterUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $chapter = Chapter::factory()->create();
        $chapterId = ChapterId::factory()->create();
        $chapterTitle = fake()->word();
        $content = fake()->paragraphs(3, true);
        $chapterNumber = fake()->numberBetween(-10000, 10000);
        $status = fake()->numberBetween(-10000, 10000);
        $story = Story::factory()->create();

        $response = $this->put(route('chapters.update', $chapter), [
            'chapterId' => $chapterId->id,
            'chapterTitle' => $chapterTitle,
            'content' => $content,
            'chapterNumber' => $chapterNumber,
            'status' => $status,
            'story_id' => $story->id,
        ]);

        $chapter->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($chapterId->id, $chapter->chapterId);
        $this->assertEquals($chapterTitle, $chapter->chapterTitle);
        $this->assertEquals($content, $chapter->content);
        $this->assertEquals($chapterNumber, $chapter->chapterNumber);
        $this->assertEquals($status, $chapter->status);
        $this->assertEquals($story->id, $chapter->story_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $chapter = Chapter::factory()->create();

        $response = $this->delete(route('chapters.destroy', $chapter));

        $response->assertNoContent();

        $this->assertModelMissing($chapter);
    }
}
