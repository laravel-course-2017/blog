<?php

namespace App\Http\Controllers;

use App\Classes\AwesomeClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewController extends Controller
{
    public function page1()
    {
        $user = new \stdClass();
        $user1 = clone $user;
        $user2 = clone $user;
        $user1->name = 'Дима';
        $user2->name = 'Вася';

        $users = [
            $user1,
            $user2
        ];

        $awesomeClass1 = resolve('Awesome');
        $awesomeClass2 = resolve('Awesome');
        dump(resolve('Awesome'));

        //$awesomeClass = new AwesomeClass();
        dump($awesomeClass1);
        dump($awesomeClass2 );

        /*return view('page1', [
            'copyright' => 'dddd',
            'users' => $users
        ]);*/


        return view('pages.secondPage', [
            'title' => 'Dabse',
            'isAdmin' => true,
            'users' => []
        ]);
    }
}
