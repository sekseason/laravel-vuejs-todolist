<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $users = User::all();

        return view('admin.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = [
            'admin' => 'Admin',
            'editor' => 'Editor',
            'user' => 'User'
        ];

        return view('admin.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        Role::create([
            'user' => $user->id,
            'role' => $request->input('role')
        ]);

        return redirect('/admin/user')->with('notify', ['type' => 'success', 'message' => 'Created successfully!']);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = [
            'admin' => 'Admin',
            'editor' => 'Editor',
            'user' => 'User'
        ];

        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = preg_replace('/\s+/', '', $request->input('password'));

        if ($password) {
            $user->password = bcrypt($password);
        }

        $user->save();
        
        Role::updateOrCreate(['user' => $id], ['role' => $request->input('role')]);

        return redirect('/admin/user')->with('notify', ['type' => 'success', 'message' => 'Updated successfully!']);
    }

    public function destroy($id)
    {
        $category = User::find($id);
        $category->delete();

        return redirect('/admin/user')->with('notify', ['type' => 'success', 'message' => 'Deleted successfully!']);
    }
}
