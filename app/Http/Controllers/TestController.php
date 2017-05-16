<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        //var_dump($request->input('surname', 'Фамилия не указана'));
        $name = $request->input('name', 'Sally');
        echo $name;
        //$str = route('getUser', [222]);

        //return  $str;

        //return redirect()->route('getUser', [222]);
    }

    public function user($id, $name)
    {
        return [$id, $name];
    }

    public function getUsers()
    {
        return [
            'user1' => [
                'name' => 'Dmitrii',
                'surname' => 'Iurev',
            ],
            'user2' => [
                'name' => 'Dmitrii',
                'surname' => 'Ivanov',
            ],
        ];
    }


}
