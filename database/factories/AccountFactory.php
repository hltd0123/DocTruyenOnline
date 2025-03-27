<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AcId;
use App\Models\Account;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'acId' => AcId::factory(),
            'userName' => fake()->word(),
            'email' => fake()->safeEmail(),
            'password' => fake()->password(),
            'role' => fake()->numberBetween(-10000, 10000),
            'create_at' => fake()->dateTime(),
            'update_at' => fake()->dateTime(),
            'status' => fake()->numberBetween(-10000, 10000),
            'comments' => fake()->word(),
            'favorites' => fake()->word(),
            'views' => fake()->word(),
        ];
    }
}
