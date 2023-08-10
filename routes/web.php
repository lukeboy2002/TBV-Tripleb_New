<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CREATE USER AFTER INVITATION
Route::get('user/create', [\App\Http\Controllers\ProfileController::class, 'create'] )->name('user.create')->middleware('HasInvitation');
Route::post('user/store', [\App\Http\Controllers\ProfileController::class, 'store'])->name('user.store');

Route::get('players', [\App\Http\Controllers\PlayerController::class, 'index'])->name('players.index');
Route::get('players/{player}', [\App\Http\Controllers\PlayerController::class, 'show'])->name('players.show');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

//MEMBERS AND ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth:web', config('jetstream.auth_session'), 'verified', 'role:member|admin'])->group(function () {
    Route::get('settings', function () {
        return view('admin.dashboard');
    })->name('settings');

    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::get('users/trashed', [\App\Http\Controllers\Admin\UserController::class, 'trashed'])->name('users.trashed');
    Route::get('users/trashed/{id}/restore', [\App\Http\Controllers\Admin\UserController::class, 'trashedRestore'])->name('users.trashed.restore');
    Route::get('users/trashed/{id}/forse_delete', [\App\Http\Controllers\Admin\UserController::class, 'trashedDelete'])->name('users.trashed.destroy');
    Route::post('/users/{user}/roles', [\App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [\App\Http\Controllers\Admin\UserController::class, 'removeRole'])->name('users.roles.revoke');
    Route::post('/users/{user}/permissions', [\App\Http\Controllers\Admin\UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [\App\Http\Controllers\Admin\UserController::class, 'revokePermission'])->name('users.permissions.revoke');

    Route::get('invite/create', [\App\Http\Controllers\Admin\InvitationController::class, 'create'])->name('invitations.create');
    Route::post('invite', [\App\Http\Controllers\Admin\InvitationController::class, 'store'])->name('invitations.store');

    Route::get('members/trashed', [\App\Http\Controllers\Admin\MemberController::class, 'trashed'])->name('members.trashed');
    Route::get('members/trashed/{id}/restore', [\App\Http\Controllers\Admin\MemberController::class, 'trashedRestore'])->name('members.trashed.restore');
    Route::get('members/trashed/{id}/forse_delete', [\App\Http\Controllers\Admin\MemberController::class, 'trashedDelete'])->name('members.trashed.destroy');
    Route::post('/members/{member}/roles', [\App\Http\Controllers\Admin\MemberController::class, 'assignRole'])->name('members.roles');
    Route::delete('/members/{member}/roles/{role}', [\App\Http\Controllers\Admin\MemberController::class, 'removeRole'])->name('members.roles.revoke');
    Route::post('/members/{member}/permissions', [\App\Http\Controllers\Admin\MemberController::class, 'givePermission'])->name('members.permissions');
    Route::delete('/members/{member}/permissions/{permission}', [\App\Http\Controllers\Admin\MemberController::class, 'revokePermission'])->name('members.permissions.revoke');
    Route::resource('members', \App\Http\Controllers\Admin\MemberController::class)->except('show', 'destroy');

    Route::post('/permissions/{permission}/roles', [\App\Http\Controllers\Admin\PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [\App\Http\Controllers\Admin\PermissionController::class, 'removeRole'])->name('permissions.roles.revoke');
    route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);

    route::post('roles/{role}/permissions', [\App\Http\Controllers\Admin\RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [\App\Http\Controllers\Admin\RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);

    Route::resource('sponsors', \App\Http\Controllers\Admin\SponsorController::class)->except('show', 'destroy');

    Route::get('slides', [\App\Http\Controllers\Admin\SlideController::class, 'index'])->name('slides.index');
    Route::get('slides/create', [\App\Http\Controllers\Admin\SlideController::class, 'create'])->name('slides.create');
    Route::get('slides/{slide}/edit', [\App\Http\Controllers\Admin\SlideController::class, 'edit'])->name('slides.edit');

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show', 'destroy');

    route::post('posts/{post}/categories', [\App\Http\Controllers\Admin\PostController::class, 'addCategory'])->name('posts.categories');
    Route::delete('/posts/{post}/categories/{category}', [\App\Http\Controllers\Admin\PostController::class, 'removeCategory'])->name('posts.categories.remove');
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);

    Route::post('upload', [\App\Http\Controllers\admin\PostController::class, 'upload'])->name('upload');
    Route::post('uploadplayer', [\App\Http\Controllers\admin\PlayerController::class, 'upload'])->name('player.upload');

    Route::post('filepondupload', [\App\Http\Controllers\Admin\FilepondController::class, 'upload'])->name('filepond.upload');
    Route::delete('filepondrevert', [\App\Http\Controllers\Admin\FilepondController::class, 'revert'])->name('filepond.revert');

    Route::get('games', [\App\Http\Controllers\Admin\GameController::class, 'index'])->name('games.index');
});
