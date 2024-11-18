<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'address', 'gender', 'phone', 'email']);
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a class="btn btn-warning text-white" href="' . route('users.edit', $row->id) . '">Edit</a>
                            <form action="' . route('users.destroy', $row->id) . '" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>';
                })
                ->make(true);
        }

        return view('master.users.index');
    }

    public function create()
    {
        return view('master.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('master.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('master.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|min:6|confirmed',
        ]);

        $data = $request->only('name', 'address', 'gender', 'phone', 'email');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
