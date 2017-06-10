<?php namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(Request $request)
    {
        return 'OK';
    }

    public function getUsers()
    {

        /*$sql = "SELECT * FROM users WHERE user = 1 OR is_admin = 2 ORDER BY count";

        DB::table('users')
            ->where('user', '=', '1')
            ->or('is_admin', '=', '2')
            ->orderBy('count')
            ->get();

        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();

        $query = DB::table('users');

        if ($a = 1) {
            $query->where('user', '=', '1');
        }

        if ($a = 1) {
            $query->where('user', '=', '1');
        }

        $query->get();

        $users = DB::table('users')->count();

        "SELECT count(*) FROM users"
        */

        $users = DB::table('users')
            ->where('name', '=', 'Дмитрий')
            ->where('password', '=', '123')
            ->pluck('email');
            //->get(['email', 'name']);
        //debug($users);
        dump($users);

        /*foreach ($users as $user) {
            dump($user->name);
        }*/

        return 'OK';

        /*return [
            'user1' => [
                'name' => 'Dmitrii',
                'surname' => 'Iurev',
            ],
            'user2' => [
                'name' => 'Dmitrii',
                'surname' => 'Ivanov',
            ],
        ];*/
    }

    public function testOrm(Request $request)
    {
        /*$newPerson = new Person();
        $newPerson->name = 'Татьяна';
        $newPerson->surname = 'Мальцева';
        $newPerson->age = 18;
        $newPerson->birthdate = '1999-01-01';
        $newPerson->notes = 'Привет всем!';
        $newPerson->save();*/

        //Person::create($request->all());

        Person::create([
            'name' => 'Татьяна111',
            'surname' => 'Мальцева222',
            'age' => 108,
            'birthdate' => '1999-01-01',
            'notes' => 'Привет всем!'
        ]);
/*
        $newPerson = Person::firstOrNew([
            'age' => 18,
            'surname' => 'Мальцева'
        ]);

        $newPerson->name = 'Татьяна2';
        $newPerson->birthdate = '1999-01-01';
        $newPerson->notes = 'Привет всем!';

        //$personModel->age = 16;
        $newPerson->save();
*/
        //dump($personModel);


        $myPerson = Person::find(1);
        $myPerson->age = 100;
        $myPerson->delete();
        //dump($myPerson);


        //$persons = Person::all();

        $persons = Person::where('name', 'Татьяна111')
            ->where('surname', 'Мальцева222')
            ->first();




        //$allUsers = Person::getAllUsers();

        /*foreach ($persons as $person) {
            echo $person->name . '<br>';
            echo $person->age;
            echo $person['age'];
            echo '<br><br>';
        }*/

        dump($persons);

        return 'ORM';
    }


}
