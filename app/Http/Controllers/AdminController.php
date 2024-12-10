<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Expr\Assign;

class AdminController extends Controller
{
    public function test_spaite()
    {
        // $role = Role::create(['name' => 'user']);
        // $permission = Permission::create(['name' => 'index peminjaman']);

        // $role->givePermissionTo($permission);
        // $permission = assignRole($role);

        // $user = auth()->user();
        // $user->assignRole('user');
        // return $user;

        $user = User::with('roles')->get();
        return $user;
    }
}