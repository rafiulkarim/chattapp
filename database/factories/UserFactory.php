<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'avater' => 'https://via.placeholder.com/150',
            'email_verified_at' => now(),
            'password' => '$2y$10$Pv8FhwuUDrBnsGk6D3SFm.C.yxjNOYbHX6cjqY624E6YE5SnQKkoy', // 111
            'remember_token' => Str::random(10),
        ];
    }
}
