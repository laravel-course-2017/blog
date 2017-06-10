<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <10; $i++) {
            DB::table('persons')->insert([
                'age' => 10,
                'name' => 'Dmitrii',
                'surname' => 'Iurev',
                'patronymic' => bcrypt('secret'),
                'birthdate' => '1984-09-04',
                'notes' => 'Я пришел к тебе с приветом',
            ]);
        }
    }
}
