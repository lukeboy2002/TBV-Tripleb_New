<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => [
                'required',
                'string',
                'max:255',
                'unique:categories',
            ],
            'active' => ['nullable'],
        ]);

        $slug = SlugService::createSlug(Category::class, 'slug', request()->title);

        Category::create([
            'title' => $request['title'],
            'slug' => $slug,
            'active' => $request['active'],
        ]);

        $request->session()->flash('success', 'Category successfully created.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.categories.edit', [
            'category'=>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $this->validate($request, [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->ignore($category),
            ],
            'active' => ['nullable'],
        ]);

        $slug = SlugService::createSlug(Category::class, 'slug', $request->title);

        $category->update([
            'title' => $request->title,
            'slug' => $slug,
            'active' => $request['active'],
        ]);

        $request->session()->flash('success', 'Category successfully changed.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
    }
}
