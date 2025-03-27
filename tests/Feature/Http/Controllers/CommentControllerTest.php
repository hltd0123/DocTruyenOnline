<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Account;
use App\Models\Comment;
use App\Models\CommentId;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CommentController
 */
final class CommentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $comments = Comment::factory()->count(3)->create();

        $response = $this->get(route('comments.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CommentController::class,
            'store',
            \App\Http\Requests\CommentStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $commentId = CommentId::factory()->create();
        $content = fake()->paragraphs(3, true);
        $status = fake()->numberBetween(-10000, 10000);
        $account = Account::factory()->create();

        $response = $this->post(route('comments.store'), [
            'commentId' => $commentId->id,
            'content' => $content,
            'status' => $status,
            'account_id' => $account->id,
        ]);

        $comments = Comment::query()
            ->where('commentId', $commentId->id)
            ->where('content', $content)
            ->where('status', $status)
            ->where('account_id', $account->id)
            ->get();
        $this->assertCount(1, $comments);
        $comment = $comments->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $comment = Comment::factory()->create();

        $response = $this->get(route('comments.show', $comment));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CommentController::class,
            'update',
            \App\Http\Requests\CommentUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $comment = Comment::factory()->create();
        $commentId = CommentId::factory()->create();
        $content = fake()->paragraphs(3, true);
        $status = fake()->numberBetween(-10000, 10000);
        $account = Account::factory()->create();

        $response = $this->put(route('comments.update', $comment), [
            'commentId' => $commentId->id,
            'content' => $content,
            'status' => $status,
            'account_id' => $account->id,
        ]);

        $comment->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($commentId->id, $comment->commentId);
        $this->assertEquals($content, $comment->content);
        $this->assertEquals($status, $comment->status);
        $this->assertEquals($account->id, $comment->account_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $comment = Comment::factory()->create();

        $response = $this->delete(route('comments.destroy', $comment));

        $response->assertNoContent();

        $this->assertModelMissing($comment);
    }
}
