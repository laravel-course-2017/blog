<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','DESC')
            ->get();

        foreach ($posts as &$post) {
            $post->url = route('site.posts.post', ['slug' => $post->slug]);
        }

        return $posts;
    }

    public function store(Request $request)
    {
        $request['active_from'] = \Carbon\Carbon::now();
        $request['slug'] = sha1(str_random(16) . microtime(true));

        $postModel = Post::create($request->all());
        $postModel->slug = $postModel->id . ':' . str_slug($postModel->title, '-');
        $postModel->save();

        return ['result' => 'OK'];
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return ['result' => 'OK'];
    }
}
