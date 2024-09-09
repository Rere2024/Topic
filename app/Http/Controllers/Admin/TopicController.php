<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Traits\Common;

class TopicController extends Controller

{
    use Common;

    //index
    public function index()
    {
        // $topics = Topic::get();
        $topics = Topic::with('category')->get();
        return view('admin.topics.index', compact('topics'));
    }  

    //create
    public function create()
    {
        $categories = Category::select('id','category_name')->get();
        return view('admin.topics.create', compact('categories'));

    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|regex:/^[a-zA-Z0-9 ]+$/',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|max:2000',
            'no_of_views' => 'required|integer|min:0',
            // 'published' => 'required|boolean',
            // 'trending' => 'required|boolean',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ]);

        $data['published'] = isset($request->published);
        $data['trending'] = isset($request->trending);
        $data['image'] = $this->uploadFile($request->image, 'adminassets/images');

    //    dd($data);
        Topic::create($data);
        return redirect()->route('topics.index');
    }

    //show
    public function show(string $id)
    {
        $topic = Topic::with('category')->findOrFail($id);
        return view('admin.topics.topic_details',compact('topic'));
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
            'title' => 'required|string|max:255|regex:/^[a-zA-Z0-9 ]+$/',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|max:2000',
            'no_of_views' => 'required|integer|min:0',
            // 'published' => 'required|boolean',
            // 'trending' => 'required|boolean',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data['published'] = isset($request->published);
        $data['trending'] = isset($request->trending);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'adminassets/images');
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
    // public function forceDelete(Request $request):RedirectResponse
    public function forceDelete(string $id)
    {
        // $id=$request->id;
        Topic::where('id', $id)->forceDelete($id);
        return redirect()->route('topics.index');
    }
}
