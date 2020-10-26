<?php

namespace Database\Factories\Entity\Post;

use App\Entity\Post\Post;
use App\Entity\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    protected $statuses;
    protected $types;
    protected $users;

    protected function getStatuses()
    {
        if (empty($this->statuses)) {
            $this->statuses = array_keys(config('post_settings.statuses'));
        }
        return $this->statuses;
    }

    protected function getTypes()
    {
        if (empty($this->types)) {
            $this->types = array_keys(config('post_settings.types'));
        }
        return $this->types;
    }

    protected function getUsers()
    {
        if (empty($this->users)) {
            $this->users = User::all()->pluck('id')->toArray();
        }
        return $this->users;
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }

    public function type()
    {
        return $this->state(function (array $attributes) {
            $types = $this->getTypes();
            return [
                'type' => $types[array_rand($types)],
            ];
        });
    }

    public function status()
    {
        return $this->state(function (array $attributes) {
            $statuses = $this->getStatuses();
            return [
                'status' => $statuses[array_rand($statuses)],
            ];
        });
    }
    public function user()
    {
        return $this->state(function (array $attributes) {
            $users = $this->getUsers();
            return [
                'user_id' => $users[array_rand($users)],
            ];
        });
    }
}