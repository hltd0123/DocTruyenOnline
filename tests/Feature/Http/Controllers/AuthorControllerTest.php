<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorId;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AuthorController
 */
final class AuthorControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $authors = Author::factory()->count(3)->create();

        $response = $this->get(route('authors.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AuthorController::class,
            'store',
            \App\Http\Requests\AuthorStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $authorId = AuthorId::factory()->create();
        $name = fake()->name();
        $status = fake()->numberBetween(-10000, 10000);
        $stories = fake()->word();

        $response = $this->post(route('authors.store'), [
            'authorId' => $authorId->id,
            'name' => $name,
            'status' => $status,
            'stories' => $stories,
        ]);

        $authors = Author::query()
            ->where('authorId', $authorId->id)
            ->where('name', $name)
            ->where('status', $status)
            ->where('stories', $stories)
            ->get();
        $this->assertCount(1, $authors);
        $author = $authors->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $author = Author::factory()->create();

        $response = $this->get(route('authors.show', $author));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AuthorController::class,
            'update',
            \App\Http\Requests\AuthorUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $author = Author::factory()->create();
        $authorId = AuthorId::factory()->create();
        $name = fake()->name();
        $status = fake()->numberBetween(-10000, 10000);
        $stories = fake()->word();

        $response = $this->put(route('authors.update', $author), [
            'authorId' => $authorId->id,
            'name' => $name,
            'status' => $status,
            'stories' => $stories,
        ]);

        $author->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($authorId->id, $author->authorId);
        $this->assertEquals($name, $author->name);
        $this->assertEquals($status, $author->status);
        $this->assertEquals($stories, $author->stories);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $author = Author::factory()->create();

        $response = $this->delete(route('authors.destroy', $author));

        $response->assertNoContent();

        $this->assertModelMissing($author);
    }
}
