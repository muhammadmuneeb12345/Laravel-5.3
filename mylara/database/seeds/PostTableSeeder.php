<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post(
            [
                'title'=>'Learning laravel',
                'content'=>'Learning laravel is Amazing...!'
            ]);
        $post->save();

        $post = new \App\Post(
            [
                'title'=>'Something Amazing',
                'content'=>'Something Amazing is Laravel...!'
            ]
        );
        $post->save();
    }
}
