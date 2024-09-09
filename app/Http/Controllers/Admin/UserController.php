<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\Common;

class UserController extends Controller

{
    use Common;

    //index
    public function index()
    {
        // $topics = Topic::get();
        $users = User::get();
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
            // 'fullname' => 'required|string|max:255|',
            'first_name' =>  'required|string|max:255',
            'last_name' =>  'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' =>  'required|string|confirmed|min:8',
            'confirm_password' =>  'required|string',
            'phone' => 'required|string|regex:/^(\+?\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/',
        ]);

        $data['active'] = isset($request->active);
        // $data['password'] = Hash::make($data['password']);
       dd($data);
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
        $users = User::findOrFail($id);
        return view('admin.users.edit_user', compact('users'));
    }


    //update
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            // 'fullname' => 'required|string|max:255|regex:/^[a-zA-Z0-9 ]+$/',
            'first_name' =>  'required|string|max:255',
            'last_name' =>  'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' =>  'required|string|confirmed|min:8',
            'confirm_password' =>  'required|string',
            'phone' => 'required|string|regex:/^(\+?\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/',
        ]);

            $data['active'] = isset($request->active);
        $data['password'] = Hash::make($data['password']);

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