<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller

{
    //index
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    //create
    public function create()
    {
        return view('admin.users.create');
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([

            'first_name' => 'required|string|max:255',
            'last_name' =>  'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users,user_name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|regex:/^[\d\s\-\+\(\)]+$/',

        ]);

        // dd($data);
        $data['email_verified_at'] = now();
        $data['active'] = isset($request->active);
        $data['password'] = Hash::make($data['password']);

        user::create($data);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    //edit
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit_user', compact('user'));
    }


    //update
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([

            'first_name' =>  'required|string|max:255',
            'last_name' =>  'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users,user_name,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
            'phone' => 'required|string|regex:/^[\d\s\-\+\(\)]+$/',
        ]);

        // dd($data);
        $data['active'] = isset($request->active);


        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        User::where('id', $id)->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function profile()
    {
        $user = Auth::user();
        return view('admin.users.profile', compact('user'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
