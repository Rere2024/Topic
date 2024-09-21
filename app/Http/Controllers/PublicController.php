<?php

namespace App\Http\Controllers;

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

        return view('public.index', compact('testimonials', 'categories', 'firstFeatured', 'secondFeatured',));
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
}
