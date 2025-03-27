<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\CommentId;
use App\Models\Story;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'commentId' => CommentId::factory(),
            'content' => fake()->paragraphs(3, true),
            'create_at' => fake()->dateTime(),
            'update_at' => fake()->dateTime(),
            'status' => fake()->numberBetween(-10000, 10000),
            'account_id' => Account::factory(),
            'story_id' => Story::factory(),
            'chapter_id' => Chapter::factory(),
        ];
    }
}
