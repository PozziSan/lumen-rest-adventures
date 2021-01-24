<?php


namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;


class UsersFactory extends Factory
{
    protected string $model = Users::class;

    #[ArrayShape([
        'name' => "string",
        "lastname" => "string",
        'email' => "string",
        "telephone" => "string"

    ])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telephone' => $this->faker->phoneNumber
        ];
    }
}
