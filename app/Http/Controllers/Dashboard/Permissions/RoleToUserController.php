<?php

namespace App\Http\Controllers\Dashboard\Permissions;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


class RoleToUserController extends Controller
{
    public function create()
    {
        $users = User::with('roles')->latest()->paginate(10);
        $roles = Role::get();
        return view('backend.role-and-management.role-to-user.create', compact('users', 'roles'));
    }

    public function store()
    {
        request()->validate([
            'user_email' => 'required|email',
            'roles' => 'required|array',
        ]);

        $user = User::where('email', request('user_email'))->firstOrFail();
        Role::findOrFail(request('roles'));
        if (!$user) {
            return redirect()->back()->with('error', "User email doesn't match in our database.");
        }
        $user->assignRole(request('roles'));

        return redirect()->back()->with('success', "Roles has been assigned to User $user->email");
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('backend.role-and-management.role-to-user.sync', compact('user', 'roles'));
    }

    public function sync(Request $request, User $user)
    {
        request()->validate([
            'roles' => 'required|array',
        ]);

        try {
            $decrypted = Crypt::decrypt($request->id);
            if( $decrypted != $user->id ) {
                return redirect()->back()->with('error', "Something went wrong!");
            }
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', "Something went wrong!");
        }

        Role::findOrFail(request('roles'));
        $user->syncRoles(request('roles'));

        return redirect()->route('menu.role.user.create')->with('success', "Role has been Synchronize to User $user->email");
    }
}
