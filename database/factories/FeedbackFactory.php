<?php

namespace Database\Factories;

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
            'feedback_name' => $this->faker->name,
            'feedback_email' => $this->faker->email,
            'feedback_telephone' => \App\Services\Helper::clearPhone($this->faker->e164PhoneNumber),
            'feedback_message' => $this->faker->text(200)
        ];
    }
}