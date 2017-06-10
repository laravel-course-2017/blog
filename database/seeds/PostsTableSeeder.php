<?php

use App\Models\Post;
use Illuminate\Database\Seeder,
    Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 10; $i++) {
            $postModel = Post::create([
                'title' => $faker->realText(50),
                'tagline' => $faker->realText(30),
                'image' => $faker->imageUrl(1280,720),
                'slug' => sha1(str_random(16) . microtime(true)),
                'announce' => $faker->realText(300),
                'fulltext' => $faker->realText(1024),
                'active_from' => Carbon::now(),
                'views_count' => mt_rand(0,100),
            ]);

            $postModel->slug = $postModel->id . ':' . str_slug($postModel->title, '-');
            $postModel->save();
        }

        $favPost = Post::find(mt_rand(1,10));
        $favPost->is_favorite = 1;
        $favPost->save();
    }
}
