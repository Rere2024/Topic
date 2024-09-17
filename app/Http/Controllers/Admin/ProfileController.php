<?php

namespace App\Http\Controllers\Admin;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     */
    public function index()
    {
        return view('admin.users.profile');
    }
}
