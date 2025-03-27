<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\AcId;
use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AccountController
 */
final class AccountControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $accounts = Account::factory()->count(3)->create();

        $response = $this->get(route('accounts.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccountController::class,
            'store',
            \App\Http\Requests\AccountStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $acId = AcId::factory()->create();
        $userName = fake()->word();
        $email = fake()->safeEmail();
        $password = fake()->password();
        $role = fake()->numberBetween(-10000, 10000);
        $status = fake()->numberBetween(-10000, 10000);
        $comments = fake()->word();
        $favorites = fake()->word();
        $views = fake()->word();

        $response = $this->post(route('accounts.store'), [
            'acId' => $acId->id,
            'userName' => $userName,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'status' => $status,
            'comments' => $comments,
            'favorites' => $favorites,
            'views' => $views,
        ]);

        $accounts = Account::query()
            ->where('acId', $acId->id)
            ->where('userName', $userName)
            ->where('email', $email)
            ->where('password', $password)
            ->where('role', $role)
            ->where('status', $status)
            ->where('comments', $comments)
            ->where('favorites', $favorites)
            ->where('views', $views)
            ->get();
        $this->assertCount(1, $accounts);
        $account = $accounts->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $account = Account::factory()->create();

        $response = $this->get(route('accounts.show', $account));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccountController::class,
            'update',
            \App\Http\Requests\AccountUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $account = Account::factory()->create();
        $acId = AcId::factory()->create();
        $userName = fake()->word();
        $email = fake()->safeEmail();
        $password = fake()->password();
        $role = fake()->numberBetween(-10000, 10000);
        $status = fake()->numberBetween(-10000, 10000);
        $comments = fake()->word();
        $favorites = fake()->word();
        $views = fake()->word();

        $response = $this->put(route('accounts.update', $account), [
            'acId' => $acId->id,
            'userName' => $userName,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'status' => $status,
            'comments' => $comments,
            'favorites' => $favorites,
            'views' => $views,
        ]);

        $account->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($acId->id, $account->acId);
        $this->assertEquals($userName, $account->userName);
        $this->assertEquals($email, $account->email);
        $this->assertEquals($password, $account->password);
        $this->assertEquals($role, $account->role);
        $this->assertEquals($status, $account->status);
        $this->assertEquals($comments, $account->comments);
        $this->assertEquals($favorites, $account->favorites);
        $this->assertEquals($views, $account->views);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $account = Account::factory()->create();

        $response = $this->delete(route('accounts.destroy', $account));

        $response->assertNoContent();

        $this->assertModelMissing($account);
    }
}
