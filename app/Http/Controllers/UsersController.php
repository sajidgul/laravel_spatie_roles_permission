<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $role = Role::all();
        $permission = Permission::all();
        return view('user.index', ['user'=>$user, 'role'=>$role, 'permission'=>$permission]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('user.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $user->assignRole($request->input('role'));

        return redirect(route('user.index'))->with("Message", 'User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::all();
        $permission = Permission::all();
        $users = User::find($id);
        return view('user.roles', [
        
            'users'=>$users,
            'roles'=>$roles,
            'permissions'=>$permission

    ]);
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with("Message", "User Deleted Successfully");
    }

    // give role to user
    public function assignRole(Request $request, User $user){
        if($user->hasRole($request->role)){
            return back()->with('Message', 'Role Exists');
        }
        $user->assignRole($request->role);
        return back()->with("Message", "Role Added");
    }

    // give permission to user
    // public function givePermission(Request $request, User $user){
    //     if($user->hasPermissionTo($request->permission)){
    //         return back()->with('Message', 'Permission Exists');
    //     }
    //     $user->givePermissionTo($request->permission);
    //     return back()->with("Message", "Permission Added");
    // }

    // remove Role
    public function removeRole(User $user, Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            Return back()->with("Message", "Role Removed");
        }
            Return back()->with("Message", "Role doesn't Exist");
    }

    // Revoke Permission
    public function revokePermission(User $user, Permission $permission){
        if($user->hasPermissionTo($permission)){
            $user->revokePermission($permission);
            Return back()->with('Message', "Permission Removed");
        }
        Return back()->with("Message", "Permission doesn't Exist");
    }
}
