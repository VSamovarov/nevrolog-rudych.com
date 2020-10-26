<?php

namespace Database\Factories\Entity\Feedback;

use App\Entity\FeedBack\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => \App\Services\Helper::clearPhone($this->faker->e164PhoneNumber),
            'message' => $this->faker->text(200)
        ];
    }
}
