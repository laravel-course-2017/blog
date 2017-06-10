<?php namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Section, App\Models\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->renderSharedViews();
    }

    protected function renderSharedViews()
    {
        View::share('sectionList', Cache::remember('sectionList', env('CACHE_TIME', 0), function () {
            return view('parts.shared.sectionList', [
                'sections' => Section::all()
            ])->render();
        }));

        View::share('favoritePost', Cache::remember('favoritePost', env('CACHE_TIME', 0), function () {
            return view('parts.shared.favoritePost', [
                'post' => Post::where('is_favorite', 1)
                    ->orderBy('id', 'DESC')
                    ->take(1)
                    ->first()
            ])->render();
        }));

        View::share('tagList', Cache::remember('tagList', env('CACHE_TIME', 0), function () {
            return view('parts.shared.tagList', [
                'tags' => Tag::all()
            ])->render();
        }));

        View::share('postList', Cache::remember('postList', env('CACHE_TIME', 0), function () {
            return view('parts.shared.postList', [
                'recentPosts' => Post::active()
                    ->inTime()
                    ->orderBy('id', 'DESC')
                    ->take(3)
                    ->get(),
                'popularPosts' => Post::active()
                    ->inTime()
                    ->orderBy('views_count', 'DESC')
                    ->take(3)
                    ->get(),
            ])->render();
        }));
    }
}
