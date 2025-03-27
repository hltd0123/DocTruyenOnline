<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\Favorite;
use App\Models\FavoriteId;
use App\Models\Story;

class FavoriteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Favorite::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'favoriteId' => FavoriteId::factory(),
            'create_at' => fake()->dateTime(),
            'update_at' => fake()->dateTime(),
            'status' => fake()->numberBetween(-10000, 10000),
            'account_id' => Account::factory(),
            'story_id' => Story::factory(),
        ];
    }
}
