<?php namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::active()
            ->intime()
            ->orderBy('id', 'DESC')
            ->paginate(config('blog.itemsPerPage'));

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Blogplace :: Блог Дмитрий Юрьев - PHP & JS разработчик, ментор, преподаватель',
            'content' => '<p>Привет, меня зовут Дмитрий Юрьев и я веб разработчик!</p>',
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'activeMenu' => 'main',
            'posts' => $posts,
        ]);
    }

    public function about()
    {
        return view('layouts.primary', [
            'page' => 'pages.about',
            'title' => 'Обо мне',
            'content' => Page::find(1)->content,
            /*'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],*/
            'activeMenu' => 'about',
        ]);
    }

    public function feedback()
    {
        return view('layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Написать мне',
            'activeMenu' => 'feedback',
        ]);
    }

    public function feedbackPost()
    {
        $this->validate($this->request, [
            'name' => 'required|max:50|min:2',
            'email' => 'required|max:255|email',
            'message' => 'required|max:10240|min:10',
        ]);

        Mail::to('dima@932433.ru')
            ->send(new FeedbackMail($this->request->all()));

        return view('layouts.primary', [
            'page' => 'parts.blank',
            'title' => 'Сообщение отправлено!',
            'content' => 'Спасибо за ваше сообщение!',
            'link' => '<a href="javascript:history.back()">Вернуться назад</a>',
            'activeMenu' => 'feedback',
        ]);
    }
}
