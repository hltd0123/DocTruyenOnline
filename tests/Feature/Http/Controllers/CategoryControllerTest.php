<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryId;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CategoryController
 */
final class CategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $categories = Category::factory()->count(3)->create();

        $response = $this->get(route('categories.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CategoryController::class,
            'store',
            \App\Http\Requests\CategoryStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $categoryId = CategoryId::factory()->create();
        $name = fake()->name();
        $status = fake()->numberBetween(-10000, 10000);

        $response = $this->post(route('categories.store'), [
            'categoryId' => $categoryId->id,
            'name' => $name,
            'status' => $status,
        ]);

        $categories = Category::query()
            ->where('categoryId', $categoryId->id)
            ->where('name', $name)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $categories);
        $category = $categories->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.show', $category));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CategoryController::class,
            'update',
            \App\Http\Requests\CategoryUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $category = Category::factory()->create();
        $categoryId = CategoryId::factory()->create();
        $name = fake()->name();
        $status = fake()->numberBetween(-10000, 10000);

        $response = $this->put(route('categories.update', $category), [
            'categoryId' => $categoryId->id,
            'name' => $name,
            'status' => $status,
        ]);

        $category->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($categoryId->id, $category->categoryId);
        $this->assertEquals($name, $category->name);
        $this->assertEquals($status, $category->status);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category));

        $response->assertNoContent();

        $this->assertModelMissing($category);
    }
}
