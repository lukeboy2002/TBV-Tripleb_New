<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
        ]);

        Role::create([
            'name' => $request['name'],
        ]);

        $request->session()->flash('success', 'Role successfully created.');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', [
            'role'=>$role,
            'permissions'=>$permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($role)],
        ]);

        $role->update([
            'name' => $request['name'],
        ]);

        $request->session()->flash('success', 'Role successfully updated.');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)) {
            $request->session()->flash('error', 'Permission already exists on role.');
            return back();
        }

        $role->givePermissionTo($request->permission);

        $request->session()->flash('success', 'Permission successfully added to role.');
        return back();
    }

    public function revokePermission(Request $request, Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);

            $request->session()->flash('success', 'Permission successfully removed from role.');
            return back();
        }

        $request->session()->flash('error', 'Permission not exists.');
        return back();
    }
}
