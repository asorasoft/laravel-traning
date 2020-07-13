<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::get();
        foreach ($users as $user) {
            \App\Post::create([
                'title' => 'Run the database seeds.',
                'description' => 'Run the database seeds.',
                'published_at' => \Carbon\Carbon::now(),
                'user_id' => $user->id,
            ]);
        }
    }
}
