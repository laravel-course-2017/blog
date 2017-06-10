<?php

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'name' => 'Общее',
            'slug' => str_slug('Общее', '-')
        ]);

        Section::create([
            'name' => 'Разработка',
            'slug' => str_slug('Разработка', '-')
        ]);

        Section::create([
            'name' => 'Квесты',
            'slug' => str_slug('Квесты', '-')
        ]);

        Section::create([
            'name' => 'Путешествия',
            'slug' => str_slug('Путешествия', '-')
        ]);
    }
}
