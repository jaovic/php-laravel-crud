<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class UserController extends Controller
{
    // Listar todos os usuários
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Mudar role do usuário
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,user'
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Role atualizado com sucesso!');
    }
}
