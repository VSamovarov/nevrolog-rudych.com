<?php

namespace Database\Seeders;

use App\Entity\Post\Post;
use App\Entity\Post\PostTranslation;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    protected $faker_localize = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory()->count(200)
            ->type()
            ->status()
            ->user()
            ->create()
            ->each(function ($post) {
                foreach (app('localizer')->getSupportedLocales() as $localeCode => $properties) {
                    PostTranslation::factory()
                        ->state([
                            'post_id' => $post->id,
                            'lang' => $localeCode,
                            'title' => "[{$localeCode}] "  .  ($title = $this->getFakerLocalize($properties['regional'])->realText(100, 2)),
                            'content' => $this->getFakerLocalize($properties['regional'])->realText(800, 5),
                            'excerpt' => $this->getFakerLocalize($properties['regional'])->realText(200, 5),
                            'metatitle' => $title,
                            'metadescription' => $this->getFakerLocalize($properties['regional'])->realText(200, 5),
                            'metakeys' => '',
                            'slug' => Str::slug($title),
                        ])
                        ->create();
                }
            });
    }

    private function getFakerLocalize($regional)
    {
        if (empty($this->faker_localize[$regional])) {
            $this->faker_localize[$regional] = Faker::create($regional);
        }
        return $this->faker_localize[$regional];
    }
}