<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\Common;

class CategoryController extends Controller
{
    use Common;
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::select('id', 'category_name')->get();
        // dd( $categories);
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create($data);

        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrfail($id);
        return view('admin.categories.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_name' => 'required|string',
        ]);


        Category::where('id', $id)->update($data);
        // $categories = Category::get();
        // return view('admin.categories.index', compact('categories'));
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request): RedirectResponse
    {
        $id = $request->id;
        Category::where('id', $id)->delete($id);
        return redirect()->route('categories.index');
    }
    public function showDeleted()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trashed', compact('categories'));
    }

    public function restore(string $id)
    {
        Category::where('id', $id)->restore();
        return redirect()->route('categories.showDeleted');
    }

    public function forceDelete(string $id)
    {
        // $id=$request->id;
        Category::where('id', $id)->forceDelete($id);
        return redirect()->route('categories.index');
    }
}
