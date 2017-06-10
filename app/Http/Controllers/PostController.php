<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Section;

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
}
