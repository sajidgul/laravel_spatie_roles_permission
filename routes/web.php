<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UsersController;
use App\Models\Post;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// dashboard view
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

// create view
Route::get('/dashboard/post/create',[PostController::class, 'create'])->name('create')->middleware('role:writer|admin');

// post created / store to database
Route::post('/', [PostController::class, 'store'])->name('store');

// Edit view
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit')->middleware('role:editor|admin');

// update the post
Route::put('update/{post}', [PostController::class, 'update'])->name('post.update');


// Group middleware on admin access
// Group middleware on admin access
// Group middleware on admin access
Route::middleware('auth', 'role:admin')->group(function(){

// role view
Route::get('roles/index', [RolesController::class, 'index'])->name('role.index');

// permission view
Route::get('permissions/index', [PermissionsController::class, 'index'])->name('permission.index');

// Users view
Route::get('users/index', [UsersController::class, 'index'])->name('user.index');

// create view role
Route::get('roles/create', [RolesController::class, 'create'])->name('role.create');

// create view permission
Route::get('permissions/create', [PermissionsController::class, 'create'])->name('permission.create');

// create Role
Route::put('role/store', [RolesController::class, 'store'])->name('role.store');

// create Permission
Route::put('permission/store', [PermissionsController::class, 'store'])->name('permission.store');

// edit role
Route::get('role/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');

// Role updated
Route::put('role/update/{role}', [RolesController::class, 'update'])->name('role.update');

// Role deleted
Route::get('role/deleted/{role}', [RolesController::class, 'destroy'])->name('role.deleted');

// edit permission
Route::get('permission/edit/{id}', [PermissionsController::class, 'edit'])->name('permission.edit');

// permission updated
Route::put('Permission/update/{permission}', [PermissionsController::class, 'update'])->name('permission.update');

// permission deleted
Route::get('Permission/deleted/{permission}', [PermissionsController::class, 'destroy'])->name('permission.deleted');

// deleted user
Route::get('user/destroy{user}', [UsersController::class, 'destroy'])->name('user.destroy');
// added a new permission to user
Route::post('user/givepermission/{user}', [UsersController::class, 'givePermission'])->name('user.givepermission');

// added new role to user
Route::post('user/assignRole/{user}', [UsersController::class, 'assignRole'])->name('user.assignRole');

// User role show
Route::get('user/role/show/{id}', [UsersController::class, 'show'])->name('user.role.show');

// User Role Remove
Route::get('user/role/remove/{user}', [UsersController::class, 'removeRole'])->name('user.role.remove');

// User Revoke Permission
Route::get('user/{user}/permission', [UsersController::class, 'revokePermission'])->name('user.permission.revoke');

// create new user view
Route::get('/user/createview', [UsersController::class, 'create'])->name('user.createview');

// Create New User
Route::put('/user/createnewuser', [UsersController::class, 'store'])->name('user.createnewuser');
});

require __DIR__.'/auth.php';
