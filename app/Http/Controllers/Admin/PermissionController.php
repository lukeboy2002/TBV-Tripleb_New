<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
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

        $permission = Permission::create([
            'name' => $request['name'],
        ]);

        $role = Role::select('id')->where('name', 'admin')->first();

        $permission->roles()->attach($role);

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
        $roles = Role::all();

        return view('admin.permissions.edit', [
            'permission'=>$permission,
            'roles'=>$roles,
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

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            $request->session()->flash('error', 'Role already exists on permission.');
            return back();
        }

        $permission->assignRole($request->role);
        $request->session()->flash('success', 'Role successfully added to permission.');
        return back();
    }

    public function removeRole(Request $request, Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);

            $request->session()->flash('success', 'Role successfully removed from permission.');
            return back();
        }

        $request->session()->flash('error', 'Role not exists.');
        return back();
    }
}
