<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\Chapter;
use App\Models\Story;
use App\Models\View;
use App\Models\ViewId;

class ViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = View::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'viewId' => ViewId::factory(),
            'viewed_at' => fake()->dateTime(),
            'create_at' => fake()->dateTime(),
            'update_at' => fake()->dateTime(),
            'status' => fake()->numberBetween(-10000, 10000),
            'account_id' => Account::factory(),
            'story_id' => Story::factory(),
            'chapter_id' => Chapter::factory(),
        ];
    }
}
