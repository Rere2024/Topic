<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
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
    public function store(Request $request )
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

    //show
    public function show(string $id)
    {
//
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
            'user_name' => 'required|string|max:255|unique:users,user_name,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'required|string|regex:/^[\d\s\-\+\(\)]+$/',
        ]);

// dd($data);
        $data['active'] = isset($request->active);
        // $data['password'] = Hash::make($data['password']);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);

        }
        User::where('id', $id)->update($data);
        return redirect()->route('users.index');
    }


    public function delete()
    {
      //
    }

    //delete
    public function showDeleted()
    {
       //
    }


    //restore
    public function restore(string $id)
    {
      //
    }

    //forcedelete
    // public function forceDelete(Request $request):RedirectResponse
    public function forceDelete(string $id)
    {
      //
    }
}