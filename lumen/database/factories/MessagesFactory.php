<?php


namespace Database\Factories;

use App\Models\Users;
use App\Models\Messages;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;


class MessagesFactory extends Factory
{
    protected string $model = Messages::class;

    #[ArrayShape([
        'user_id' => "integer",
        "description" => "string",

    ])]
    public function definition(): array
    {
        $user = Users::factory()->make();

        return [
            'user_id' => $user['id'],
            'description' => $this->faker->text
        ];
    }
}
