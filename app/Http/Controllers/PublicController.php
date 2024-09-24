<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Topic;

class PublicController extends Controller
{
    public function index()
    {

        $firstFeatured = Topic::orderBy('id', 'desc')
            ->where('published', 1)
            ->first();
        $secondFeatured = Topic::where('published', 1)
            ->latest()
            ->skip(1)
            ->first();

        $categories = Category::with(['topics'
        => function ($query) {
            $query
            ->where('published', 1)
            ->take(3);
        }])->limit(5)
            ->get();

        $testimonials = Testimonial::where('published', 1)
            ->latest()
            ->take('3')
            ->get();
            $topics = Topic::get();
        return view('public.index', compact('testimonials', 'categories', 'firstFeatured', 'secondFeatured','topics'));
    }



    public function contact()
    {
        return view('public.contact-us');
    }

    public function testimonial()
    {
        $testimonials = Testimonial::where('published', 1)->get();
        return view('public.testimonial', compact('testimonials'));
    }


    public function show(string $id)
    {

        $topic = Topic::with('category')->findOrFail($id);
        // dd($topic);
        return view('public.details', compact('topic'));
    }


    public function topiclisting()
    {


        $firstTrending = Topic::where('published', 1)
            ->where('trending', 1)
            ->orderBy('no_of_views', 'desc')
            ->take(1)
            ->get();
        $secondTrending = Topic::where('published', 1)
            ->where('trending', 1)
            ->latest()
            ->skip(1)
            ->take(1)
            ->get();

        $topics = Topic::where('published', 1)
            ->paginate(3);

        return view('public.topic-listing', compact('topics', 'firstTrending', 'secondTrending'));
    }

    public function category()
    {

        $categories = Category::with(['topics'
        => function ($query) {
            $query
            ->where('published', 1)
            ->take(3);
        }])->limit(5)
            ->get();

        return view('public.category', compact('categories'));
    }


    // public function bookmark(Request $request)
    // {
    //     // Validate the request
    //     $data = $request->validate([
    //         'topic_id' => 'required|integer',
    //     ]);

    //     // Get current bookmarks from the session
    //     $bookmarks = session()->get('bookmarks', []);

    //     // Add the topic_id to the bookmarks if it's not already there
    //     if (!in_array($data['topic_id'], $bookmarks)) {
    //         $bookmarks[] = $data['topic_id'];
    //         session()->put('bookmarks', $bookmarks);
    //     }

    //     return redirect()->back()->with('success','Topic bookmarked successfully!');
    //// }
}
