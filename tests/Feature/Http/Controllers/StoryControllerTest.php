<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Story;
use App\Models\StoryId;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StoryController
 */
final class StoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $stories = Story::factory()->count(3)->create();

        $response = $this->get(route('stories.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StoryController::class,
            'store',
            \App\Http\Requests\StoryStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $storyId = StoryId::factory()->create();
        $title = fake()->sentence(4);
        $status = fake()->boolean();
        $author = Author::factory()->create();
        $category = Category::factory()->create();

        $response = $this->post(route('stories.store'), [
            'storyId' => $storyId->id,
            'title' => $title,
            'status' => $status,
            'author_id' => $author->id,
            'category_id' => $category->id,
        ]);

        $stories = Story::query()
            ->where('storyId', $storyId->id)
            ->where('title', $title)
            ->where('status', $status)
            ->where('author_id', $author->id)
            ->where('category_id', $category->id)
            ->get();
        $this->assertCount(1, $stories);
        $story = $stories->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $story = Story::factory()->create();

        $response = $this->get(route('stories.show', $story));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StoryController::class,
            'update',
            \App\Http\Requests\StoryUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $story = Story::factory()->create();
        $storyId = StoryId::factory()->create();
        $title = fake()->sentence(4);
        $status = fake()->boolean();
        $author = Author::factory()->create();
        $category = Category::factory()->create();

        $response = $this->put(route('stories.update', $story), [
            'storyId' => $storyId->id,
            'title' => $title,
            'status' => $status,
            'author_id' => $author->id,
            'category_id' => $category->id,
        ]);

        $story->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($storyId->id, $story->storyId);
        $this->assertEquals($title, $story->title);
        $this->assertEquals($status, $story->status);
        $this->assertEquals($author->id, $story->author_id);
        $this->assertEquals($category->id, $story->category_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $story = Story::factory()->create();

        $response = $this->delete(route('stories.destroy', $story));

        $response->assertNoContent();

        $this->assertModelMissing($story);
    }
}
