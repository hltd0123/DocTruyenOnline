<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Account;
use App\Models\Favorite;
use App\Models\FavoriteId;
use App\Models\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FavoriteController
 */
final class FavoriteControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $favorites = Favorite::factory()->count(3)->create();

        $response = $this->get(route('favorites.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FavoriteController::class,
            'store',
            \App\Http\Requests\FavoriteStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $favoriteId = FavoriteId::factory()->create();
        $status = fake()->numberBetween(-10000, 10000);
        $account = Account::factory()->create();
        $story = Story::factory()->create();

        $response = $this->post(route('favorites.store'), [
            'favoriteId' => $favoriteId->id,
            'status' => $status,
            'account_id' => $account->id,
            'story_id' => $story->id,
        ]);

        $favorites = Favorite::query()
            ->where('favoriteId', $favoriteId->id)
            ->where('status', $status)
            ->where('account_id', $account->id)
            ->where('story_id', $story->id)
            ->get();
        $this->assertCount(1, $favorites);
        $favorite = $favorites->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $favorite = Favorite::factory()->create();

        $response = $this->get(route('favorites.show', $favorite));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FavoriteController::class,
            'update',
            \App\Http\Requests\FavoriteUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $favorite = Favorite::factory()->create();
        $favoriteId = FavoriteId::factory()->create();
        $status = fake()->numberBetween(-10000, 10000);
        $account = Account::factory()->create();
        $story = Story::factory()->create();

        $response = $this->put(route('favorites.update', $favorite), [
            'favoriteId' => $favoriteId->id,
            'status' => $status,
            'account_id' => $account->id,
            'story_id' => $story->id,
        ]);

        $favorite->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($favoriteId->id, $favorite->favoriteId);
        $this->assertEquals($status, $favorite->status);
        $this->assertEquals($account->id, $favorite->account_id);
        $this->assertEquals($story->id, $favorite->story_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $favorite = Favorite::factory()->create();

        $response = $this->delete(route('favorites.destroy', $favorite));

        $response->assertNoContent();

        $this->assertModelMissing($favorite);
    }
}
