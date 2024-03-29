<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Entity\User\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            FeedbackSeeder::class,
            PostSeeder::class
        ]);
    }
}