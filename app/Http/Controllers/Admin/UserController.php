<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller

{
    //index
    public function index()
    {
        // $users = User::latest()->paginate(10);
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    //create
    public function create()
    {
        // $users = User::select('id')->get();
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
        return redirect()->route('users.index');
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
        $data = $request->validate([

            'first_name' =>  'required|string|max:255',
            'last_name' =>  'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users,user_name,',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'nullable|string|min:8',
            'phone' => 'required|string|regex:/^[\d\s\-\+\(\)]+$/',
        ]);

        // dd($data);
        $data['active'] = isset($request->active);
        $data['password'] = Hash::make($data['password']);

        User::where('id', $id)->update($data);
        return redirect()->route('users.index');
    }
}
