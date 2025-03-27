<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Account;
use App\Models\Story;
use App\Models\View;
use App\Models\ViewId;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ViewController
 */
final class ViewControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $views = View::factory()->count(3)->create();

        $response = $this->get(route('views.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ViewController::class,
            'store',
            \App\Http\Requests\ViewStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $viewId = ViewId::factory()->create();
        $viewed_at = Carbon::parse(fake()->dateTime());
        $status = fake()->numberBetween(-10000, 10000);
        $account = Account::factory()->create();
        $story = Story::factory()->create();

        $response = $this->post(route('views.store'), [
            'viewId' => $viewId->id,
            'viewed_at' => $viewed_at->toDateTimeString(),
            'status' => $status,
            'account_id' => $account->id,
            'story_id' => $story->id,
        ]);

        $views = View::query()
            ->where('viewId', $viewId->id)
            ->where('viewed_at', $viewed_at)
            ->where('status', $status)
            ->where('account_id', $account->id)
            ->where('story_id', $story->id)
            ->get();
        $this->assertCount(1, $views);
        $view = $views->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $view = View::factory()->create();

        $response = $this->get(route('views.show', $view));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ViewController::class,
            'update',
            \App\Http\Requests\ViewUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $view = View::factory()->create();
        $viewId = ViewId::factory()->create();
        $viewed_at = Carbon::parse(fake()->dateTime());
        $status = fake()->numberBetween(-10000, 10000);
        $account = Account::factory()->create();
        $story = Story::factory()->create();

        $response = $this->put(route('views.update', $view), [
            'viewId' => $viewId->id,
            'viewed_at' => $viewed_at->toDateTimeString(),
            'status' => $status,
            'account_id' => $account->id,
            'story_id' => $story->id,
        ]);

        $view->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($viewId->id, $view->viewId);
        $this->assertEquals($viewed_at->timestamp, $view->viewed_at);
        $this->assertEquals($status, $view->status);
        $this->assertEquals($account->id, $view->account_id);
        $this->assertEquals($story->id, $view->story_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $view = View::factory()->create();

        $response = $this->delete(route('views.destroy', $view));

        $response->assertNoContent();

        $this->assertModelMissing($view);
    }
}
