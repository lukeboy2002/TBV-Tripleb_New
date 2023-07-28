<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sponsors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:sponsors'],
            'link' => ['required', 'url'],
            'image' => ['required'],
            'active' => ['nullable'],
        ]);

        $newFilename = Str::after($request->input('image'), 'tmp/');
        Storage::disk('public')->move($request->input('image'), "sponsors/$newFilename");

        Sponsor::create([
            'name' => $request['name'],
            'link' => $request['link'],
            'active' => $request['active'],
            'image' => "sponsors/$newFilename"
        ]);

        $request->session()->flash('success', 'Sponsor successfully created.');
        return redirect()->route('admin.sponsors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.edit', [
            'sponsor'=>$sponsor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', Rule::unique('sponsors')->ignore($sponsor)],
            'link' => ['required', 'url'],
            'image' => ['required'],
            'active' => ['nullable'],
        ]);

        if (str()->afterLast($request->input('image'), '/') !== str()->afterLast($sponsor->image, '/')) {
            Storage::disk('public')->delete($sponsor->image);
            $newFilename = Str::after($request->input('image'), 'tmp/');
            Storage::disk('public')->move($request->input('image'), "sponsors/$newFilename");
        }

        $sponsor->update([
            'name' => $request['name'],
            'link' => $request['link'],
            'active' => $request['active'],
            'image' => isset($newFilename) ? "sponsors/$newFilename" : $sponsor->image,
        ]);

        $request->session()->flash('success', 'Sponsor successfully updated.');
        return redirect()->route('admin.sponsors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}
