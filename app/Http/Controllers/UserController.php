<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if(\Auth::user()->role->first()->role === 'admin') {
            $users = User::orderBy('name')->with(['role'])->get();

            return view('user.index')->with(compact('users'));
        }

        return redirect()->route('home')->with('warning', 'Permission denied');
    }

    public function edit($id)
    {
        $user = User::with(['role'])->find($id);
        $roles = Role::get()->pluck('label', 'id')->toArray();
        $roleId = $user->role->first()->id ?? 0;

        return view('user.edit')->with(compact('user', 'roles', 'roleId'));
    }

    public function update(Request $request, $id)
    {
        $user = User::with(['role'])->find($id);
        $user->name = $request->get('name');
        $user->role()->sync($request->get('role_id'));
        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'User has been successfully updated.');
    }

    public function setRole($roleLabel)
    {
        $user = User::find($this->getUser());
        $roles = Role::get()->pluck('role', 'id')->toArray();
        $role = Role::where('role', $roleLabel)->first();

        if(!is_null($role)) {
            if (in_array($role->role, $roles)) {
                $user->role()->sync($role->id);

                return redirect()->route('user.index')
                    ->with('success', 'User is ' . $role->label . ' now.');
            }
        }

        return redirect()->route('user.index')
            ->with('danger', 'Role does not exist.');
    }
}
