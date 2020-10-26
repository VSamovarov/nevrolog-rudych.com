<?php

namespace Database\Factories\Entity\Post;

use App\Entity\Post\PostTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lang = app()->getLocale();
        $title = $this->faker->realText(100, 2);
        return [
            'lang' => $lang,
            'title' => $title,
            'content' => $this->faker->realText(800, 5),
            'excerpt' => $this->faker->realText(200, 5),
            'metatitle' => $title,
            'metadescription' => $this->faker->realText(200, 5),
            'metakeys' => '',
            'slug' => Str::slug($title),
        ];
    }
}