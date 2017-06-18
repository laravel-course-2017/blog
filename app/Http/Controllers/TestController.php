<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\AwesomeClass;
use App\Classes\Uploader;

class TestController extends Controller
{
    protected $awesome;

    public function __construct(Request $request, AwesomeClass $awesome)
    {
        parent::__construct($request);
        $this->awesome = $awesome;
    }

    public function testGet(Uploader $uploader)
    {
        return '<form enctype="multipart/form-data" method="POST">'.
            csrf_field() .
            '<input type="file" name="file" />
            <input type="submit" value="Go!" />
        </form>';
    }

    public function testPost(Request $request, Uploader $uploader, Upload $uploadModel)
    {
        $rules = [
            'maxSize' => 10 * 1024 * 1024,
            'minSize' => 10 * 1024,
            'allowedExt' => [
                'jpeg',
                'jpg',
                'png',
                'gif',
                'bmp',
                'tiff',
                'pdf'
            ],
            'allowedMime' => [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'application/pdf'
            ],
        ];

        if ($uploader->validate($request, 'file', $rules)) {
            $uploadedPath = $uploader->upload();

            if ($uploadedPath !== false) {
                $uploadsModel = $uploader->register($uploadModel);
                $uploadedProps = $uploader->getProps();
            }

            return $uploadedPath;
        }
        else {
            dump($uploader->getProps());
            dump($uploader->getErrors());
        }

        //return $uploader->getErrors();
    }

    public function testUser()
    {
        $userModel = User::find(1);
        dump($userModel->phone->phone);

        $phoneModel = Phone::find(1);
        dump($phoneModel->user->name);
        //$userModel->user_name = 'Peter Sidorov';
        //$userModel->save();
        //dump($userModel->user_name);
    }

    public function testComment()
    {
        $postModel = Post::find(1);
        dump($postModel->comments->count());

        foreach ($postModel->comments as $comment) {
            dump($comment->comment);
        }

        $commentModel = Comment::find(1);
        dump($commentModel->post);
    }

    public function someMethod(Request $request)
    {
        $name = $this->request->input('name', 'Дмитрий');
        $surname = $request->input('surname', 'Юрьев');

        /*if (isset($_GET['name'])) {
            $name = $_GET['name'];
        } else {
            $name = 'Дмитрий';
        }*/

       /* var_dump($awesomeClass->getCounter());
        var_dump($awesomeClass->getCounter());
        var_dump($awesomeClass->getCounter());
        var_dump($awesomeClass->getCounter());
        var_dump($awesomeClass->getCounter());*/

        $a = resolve('App\Classes\AwesomeClass');
        var_dump($a->getCounter());


        $b = resolve('App\Classes\AwesomeClass');
        var_dump($b->getCounter());

        /*$awesome = new \App\Classes\AwesomeClass();
        var_dump($awesome->someSerious());
        var_dump($awesome->someSerious());
        var_dump($awesome->someSerious());
        var_dump($awesome->someSerious());
        */

        return view('test', [
           'name' => $name,
            'surname' => $surname
        ]);


        //return $this->request->all();
    }
    public function someMethod2(Request $request, $name, $surname = null)
    {
        //$name = $this->request->input('name', 'Дмитрий');
        //$surname = $request->input('surname', 'Юрьев');

        /*if (isset($_GET['name'])) {
            $name = $_GET['name'];
        } else {
            $name = 'Дмитрий';
        }*/

        return view('test', [
            'name' => $name,
            'surname' => $surname
        ]);


        //return $this->request->all();
    }

    public function showPosts()
    {
        return view('pages.content', [
            'mainContent' => 'Содержимое',
            'title' => 'Заголовок страницы',
            'template' => 'pages.content2',
            'users' => []
        ]);
    }

    public function awesomeMethod()
    {
        //AwesomeClass $awesome
        //$awesome = $this->awesome;
        //$awesome = new AwesomeClass();
        /*var_dump($this->awesome->getCounter());
        var_dump($this->awesome->getCounter());
        var_dump($this->awesome->getCounter());
        var_dump($this->awesome->getCounter());*/


        /*$a = resolve('App\Classes\AwesomeClass');
        var_dump($a->getCounter());
        var_dump($a);*/


        /*$b = resolve('App\Classes\AwesomeClass');
        var_dump($b->getCounter());
        var_dump($b);*/


       // return '111';

        /*return response('111', 200)
            ->header('Content-Type', 'text/html')
            ->header('access-control-allow-origin', '*')
            ->cookie('mycookie', '1111', 86400 / 60);*/

        return [
            'a' => 1,
            'b' => 2
        ];



        $arr = [
            'a' => 1,
            'b' => 2
        ];

        return response(json_encode($arr), 200)
            ->header('Content-Type', 'application/json');



        //echo '111';
    }
}
