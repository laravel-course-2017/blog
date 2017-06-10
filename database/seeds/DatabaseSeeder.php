<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(PostsSectionsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTagsTableSeeder::class);
        $this->call(PageTableSeeder::class);
    }
}
