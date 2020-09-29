<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Feedback;
use Faker\Generator as Faker;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'feedback_name' => $faker->name,
        'feedback_email' => $faker->email,
        'feedback_telephone' => App\Services\Helper::clearPhone($faker->e164PhoneNumber),
        'feedback_message' => $faker->text(200),
    ];
});
