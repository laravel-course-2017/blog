<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function postBySlug($slug)
    {
        try {
            $post = Post::where('slug', $slug)
                ->active()
                ->intime()
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404);
        }

        return view('layouts.secondary', [
            'page' => 'pages.post',
            'title' => $post->title,
            'post' => $post
        ]);
    }

    public function listByTag($tag)
    {
        try {
            $tag = Tag::where('name', $tag)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404);
        }

        $posts = $tag->posts()
            ->active()
            ->intime()
            ->orderBy('id', 'DESC')
            ->paginate(config('blog.itemsPerPage'));

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Список статей по тегу ' . $tag,
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'posts' => $posts,
        ]);
    }

    public function listBySection($section)
    {
        try {
            $section = Section::where('name', $section)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404);
        }

        $posts = $section->posts()
            ->active()
            ->intime()
            ->orderBy('id', 'DESC')
            ->paginate(config('blog.itemsPerPage'));

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Список статей в разделе ' . $section,
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        /*if (Gate::denies('create')) {
            abort(403);
        }*/

        /*if (Auth::user()->cant('create', Post::class)) {
            abort(403);
        }*/

        $this->authorize('create', Post::class);

        return view('layouts.primary', [
            'page' => 'pages.create',
            'title' => 'Создание нового поста',
        ]);
    }

    public function createPost(Request $request)
    {
        /*if (Gate::denies('create')) {
            abort(403);
        }*/

        /*if (Auth::user()->cant('create', Post::class)) {
            abort(403);
        }*/

        $this->authorize('create', Post::class);

        $request['active_from'] = \Carbon\Carbon::now();
        $request['slug'] = sha1(str_random(16) . microtime(true));

        $postModel = Post::create($this->request->all());
        $postModel->slug = $postModel->id . ':' . str_slug($postModel->title, '-');
        $postModel->save();

        return redirect()->route('site.main.index');
    }

    public function edit($postId)
    {
        $postModel = Post::findOrFail($postId);

        /*if (Gate::denies('update', $postModel)) {
            abort(403);
        }*/

        /*if (Auth::user()->cant('update', $postModel)) {
            abort(403);
        }*/

        $this->authorize('update', $postModel);

        return view('layouts.primary', [
            'page' => 'pages.edit',
            'title' => 'Редактирование поста',
            'postModel' => $postModel
        ]);
    }

    public function editPost(Request $request, $postId)
    {
        $postModel = Post::findOrFail($postId);

        /*if (Gate::denies('update', $postModel)) {
            abort(403);
        }*/

        /*if (Auth::user()->cant('update', $postModel)) {
            abort(403);
        }*/

        $this->authorize('update', $postModel);

        $postModel->slug = $postModel->id . ':' . str_slug($postModel->title, '-');
        $postModel->fill($this->request->all());
        $postModel->save();

        return redirect()->route('site.main.index');
    }
}
