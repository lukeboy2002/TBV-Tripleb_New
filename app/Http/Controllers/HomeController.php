<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Latest post
        $latestPost = Post::where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->limit(1)
            ->first();

        return view('welcome', compact(
            'latestPost'
        ));
    }
}
