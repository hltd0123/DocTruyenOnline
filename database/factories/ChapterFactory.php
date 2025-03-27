<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Chapter;
use App\Models\ChapterId;
use App\Models\Story;

class ChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapter::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'chapterId' => ChapterId::factory(),
            'chapterTitle' => fake()->word(),
            'content' => fake()->paragraphs(3, true),
            'chapterNumber' => fake()->numberBetween(-10000, 10000),
            'create_at' => fake()->dateTime(),
            'update_at' => fake()->dateTime(),
            'status' => fake()->numberBetween(-10000, 10000),
            'story_id' => Story::factory(),
        ];
    }
}
