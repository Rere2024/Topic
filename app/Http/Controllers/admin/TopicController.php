<?php

namespace App\Http\Controllers;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {

        // $jobs = Topic::with('category')->get();
        return view('admin.topics', compact('topics'));
    }
}
