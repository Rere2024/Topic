<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Traits\Common;

class TopicController extends Controller

{
    use Common;

    //index
    public function index()
    {
        // $topics = Topic::latest()->take(3)->get();
        $topics = Topic::with('category')->get();
        return view('admin.topics.index', compact('topics'));
    }

    //create
    public function create()
    {
        $categories = Category::select('id', 'category_name')->get();
        return view('admin.topics.create', compact('categories'));
    }

    //show
    public function show(string $id)
    {

        $topic = Topic::findOrFail($id);
        return view('admin.topics.topic_details', compact('topic'));
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-.,!?\'"()]+$/',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|max:2000',
            'no_of_views' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $data['published'] = isset($request->published);
        $data['trending'] = isset($request->trending);
        $data['image'] = $this->uploadFile($request->image, 'adminassets/images/topics/');

        //    dd($data);
        Topic::create($data);
        return redirect()->route('topics.index');
    }



    //edit
    public function edit(string $id)
    {
        $topics = Topic::findOrFail($id);
        $categories = Category::select('id', 'category_name')->get();
        return view('admin.topics.edit_topic', compact('topics', 'categories'));
    }


    //update
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-.,!?\'"()]+$/',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|max:2000',
            'no_of_views' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['published'] = isset($request->published);
        $data['trending'] = isset($request->trending);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'adminassets/images/topics/');
        }

        Topic::where('id', $id)->update($data);
        return redirect()->route('topics.index');
    }


    public function delete(Request $request): RedirectResponse
    {
        $id = $request->id;
        Topic::where('id', $id)->delete($id);
        return redirect()->route('topics.index');
    }

    //delete
    public function showDeleted()
    {
        $topics = Topic::onlyTrashed()->get();
        return view('admin.topics.trashed', compact('topics'));
    }


    //restore
    public function restore(string $id)
    {
        Topic::where('id', $id)->restore();
        return redirect()->route('topics.showDeleted');
    }

    //forcedelete
    public function forceDelete(string $id)
    {
        Topic::where('id', $id)->forceDelete($id);
        return redirect()->route('topics.index');
    }
}
