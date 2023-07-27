<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Sponsor;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:posts'],
            'image' => ['required'],
            'body' => 'nullable|min:10',
            'active' => 'nullable',
            'published_at' => 'nullable',
        ]);

        $newFilename = Str::after($request->input('image'), 'tmp/');
        Storage::disk('public')->move($request->input('image'), "posts/$newFilename");

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $post = Post::create([
            'user_id' => current_user()->id,
            'title' => $request['title'],
            'slug' => $slug,
            'image' => "posts/$newFilename",
            'body' => $request['body'],
            'active' => $request['active'],
            'published_at' => $request['published_at'],
        ]);

        $post->categories()->attach($request->categories);

        $request->session()->flash('success', 'Post successfully created.');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function upload(Request $request)
    {
        try {
            $post = new Post();
            $post->id = 0;
            $post->exists = true;
            $image = $post->addMediaFromRequest('upload')->toMediaCollection('thumb');

            return response()->json([
                'uploaded' => true,
                'url' => $image->getUrl('thumb')
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'uploaded' => false,
                    'error'    => [
                        'message' => $e->getMessage()
                    ]
                ]
            );
        }
    }
}
