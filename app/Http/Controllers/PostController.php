<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Intervention\Image\Exception\NotFoundException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->where('active', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->with('user', 'categories', 'views')
            ->paginate(6);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (!$post->active || $post->published_at > Carbon::now()) {
            throw new NotFoundException();
        }

        $next = Post::where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->whereDate('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->limit(1)
            ->first();

        $prev = Post::where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->whereDate('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->limit(1)
            ->first();

//        $user = $request->user();

        /*        PostView::create([
                    'post_id' => $post->id,
                    'user_id' => $user?->id,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);*/

        return view('posts.show', [
            'post' => $post,
            'next' => $next,
            'prev' => $prev,
        ]);
    }

    public function byCategory(Category $category)
    {
        $posts = Post::query()
            ->join('category_post', 'posts.id', '=', 'category_post.post_id')
            ->where('category_post.category_id', '=', $category->id)
            ->where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->with('user', 'categories', 'views')
            ->paginate(6);

        return view('posts.index', [
            'posts' => $posts,
            'category' => $category
        ]);
    }
}

