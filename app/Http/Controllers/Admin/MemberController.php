<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Player;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    use PasswordValidationRules;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.members.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => [
                'required',
                'string',
                'alpha_dash',
                'max:255',
                'unique:users',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => $this->passwordRules(),
            'image' => 'required',
        ]);

        $newFilename = Str::after($request->input('image'), 'tmp/');
        Storage::disk('public')->move($request->input('image'), "members/$newFilename");

        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'email_verified_at' => now(),
//            'image' => "members/$newFilename"
        ]);

        //generate image
        $username = get_initials($user->username);
        $id = $user->id.'.png';
        $path = '/profile-photos/';
        $imagePath = create_avatar($username, $id, $path);

        //save image
        $user->profile_photo_path = $imagePath;
        $user->save();

        Player::create([
            'user_id' => $user->id,
            'image' => "members/$newFilename"
        ]);

        $role = Role::select('id')->where('name', 'member')->first();

        $user->roles()->attach($role);

        $request->session()->flash('success', 'Member account successfully created.');
        return redirect()->route('admin.members.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $member)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.members.edit', [
            'member' => $member,
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $member)
    {
        $this->validate($request, [
            'image' => ['required'],
        ]);

        if (str()->afterLast($request->input('image'), '/') !== str()->afterLast($member->image, '/')) {
            Storage::disk('public')->delete($member->player->image);
            $newFilename = Str::after($request->input('image'), 'tmp/');
            Storage::disk('public')->move($request->input('image'), "members/$newFilename");
        }

        $member->player->update([
            'image' => isset($newFilename) ? "members/$newFilename" : $member->image
        ]);

        $request->session()->flash('success', 'Member successfully updated.');
        return redirect()->route('admin.members.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function trashed()
    {
        //
    }

    public function trashedRestore(Request $request, $id)
    {
        $member = User::onlyTrashed()->findOrFail($id);
        $member->restore();

        $request->session()->flash('success', 'Member has been restored');

        return back();
    }

    public function trashedDelete(Request $request, $id)
    {
        $member = User::onlyTrashed()->findOrFail($id);
        $profile_photo_path = $member->profile_photo_path;
        $image = $member->image;

        Storage::delete($profile_photo_path);
        Storage::delete($image);

        $member->forceDelete();
        $request->session()->flash('success', 'Member has been completed deleted');

        return back();
    }

    public function assignRole(Request $request, User $member)
    {
        if ($member->hasRole($request->role)) {
            $request->session()->flash('error', 'Role already exists on permission.');
            return back();
        }

        $member->assignRole($request->role);
        $request->session()->flash('success', 'Role successfully added to permission.');
        return back();
    }

    public function removeRole(Request $request, User $member, Role $role)
    {
        if ($member->hasRole($role)) {
            $member->removeRole($role);

            $request->session()->flash('success', 'Role successfully removed from member.');
            return back();
        }

        $request->session()->flash('error', 'Role not exists.');
        return back();
    }

    public function givePermission(Request $request, User $member)
    {
        if ($member->hasPermissionTo($request->permission)) {
            $request->session()->flash('error', 'Permission already exists on member.');
            return back();
        }
        $member->givePermissionTo($request->permission);

        $request->session()->flash('success', 'Permission successfully added to member.');
        return back();
    }

    public function revokePermission(Request $request, User $member, Permission $permission)
    {
        if ($member->hasPermissionTo($permission)) {
            $member->revokePermissionTo($permission);

            $request->session()->flash('success', 'Permission successfully removed from member.');
            return back();
        }
        $request->session()->flash('error', 'Permission not exists.');
        return back();
    }
}
