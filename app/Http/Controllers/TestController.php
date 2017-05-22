<?php namespace App\Http\Controllers;

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


}
