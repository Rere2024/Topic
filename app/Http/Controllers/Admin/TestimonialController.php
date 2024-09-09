<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;

class TestimonialController extends Controller

{
    use Common;

    //index
    public function index()
    {

        $testimonials = Testimonial::get();
        return view('admin.testimonials.index', compact('testimonials'));
    }  

    //create
    public function create()
    {

        return view('admin.testimonials.create');

    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9 ]+$/',
            'content' => 'required|string|max:2000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data['published'] = isset($request->published);
        $data['image'] = $this->uploadFile($request->image, 'adminassets/images');

    //    dd($data);
        Testimonial::create($data);
        return redirect()->route('testimonials.index');
    }

    //show
    public function show(string $id)
    {
        $testimonial = Testimonial::with('category')->findOrFail($id);
        return view('admin.testimonials.testimonial_details',compact('testimonial'));
    }

    //edit
    public function edit(string $id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit_testimonial', compact('testimonials'));
    }


    //update
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9 ]+$/',
            'content' => 'required|string|max:2000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data['published'] = isset($request->published);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'adminassets/images');
        }

        Testimonial::where('id', $id)->update($data);
        return redirect()->route('testimonials.index');
    }


    public function delete(Request $request): RedirectResponse
    {
        $id = $request->id;
        Testimonial::where('id', $id)->delete($id);
        return redirect()->route('testimonials.index');
    }

    //delete
    public function showDeleted()
    {
        $testimonials = Testimonial::onlyTrashed()->get();
        return view('admin.testimonials.trashed', compact('testimonials'));
    }


    //restore
    public function restore(string $id)
    {
        Testimonial::where('id', $id)->restore();
        return redirect()->route('testimonials.showDeleted');
    }

    //forcedelete
    // public function forceDelete(Request $request):RedirectResponse
    public function forceDelete(string $id)
    {
        // $id=$request->id;
        Testimonial::where('id', $id)->forceDelete($id);
        return redirect()->route('testimonials.index');
    }
}
