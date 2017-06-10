<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'content' => 'Привет, я Дмитрий Юрьев и я web разработчик!'
        ]);
    }
}
