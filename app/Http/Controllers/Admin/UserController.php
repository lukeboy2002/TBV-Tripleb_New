<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.edit', [
            'user'=>$user,
            'roles'=>$roles,
            'permissions'=>$permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }

    public function trashed()
    {
        //
    }

    public function trashedRestore(Request $request, $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        $request->session()->flash('success', 'User has been restored');

        return back();
    }

    public function trashedDelete(Request $request, $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $profile_photo_path = $user->profile_photo_path;

        Storage::delete($profile_photo_path);

        $user->forceDelete();
        $request->session()->flash('success', 'User has been completed deleted');

        return back();
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            $request->session()->flash('error', 'Role already exists on user.');
            return back();
        }

        $user->assignRole($request->role);
        $request->session()->flash('success', 'Role successfully added to user.');
        return back();
    }

    public function removeRole(Request $request, User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);

            $request->session()->flash('success', 'Role successfully removed from user.');
            return back();
        }

        $request->session()->flash('error', 'Role not exists.');
        return back();
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            $request->session()->flash('error', 'Permission already exists on user.');
            return back();
        }
        $user->givePermissionTo($request->permission);

        $request->session()->flash('success', 'Permission successfully added to user.');
        return back();
    }

    public function revokePermission(Request $request, User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);

            $request->session()->flash('success', 'Permission successfully removed from user.');
            return back();
        }
        $request->session()->flash('error', 'Permission not exists.');
        return back();
    }
}
