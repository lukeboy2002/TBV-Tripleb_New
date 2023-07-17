<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:permissions'],
        ]);

        Permission::create([
            'name' => $request['name'],
        ]);

        $request->session()->flash('success', 'Permission successfully created.');
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', [
            'permission'=>$permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', Rule::unique('permissions')->ignore($permission)],
        ]);

        $permission->update([
            'name' => $request['name'],
        ]);

        $request->session()->flash('success', 'Permissions successfully updated.');
        return redirect()->route('admin.permissions.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
