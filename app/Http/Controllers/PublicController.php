<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Topic;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        // $topics=$this->topicData();
        $topics = Topic::latest()->take(3)->get();
        $testimonials = Testimonial::where('published', 1)->latest()->take('3')->get();
        return view('public.index', compact('testimonials', 'categories', 'topics'));
    }

    public function contact()
    {
        return view('public.contact-us');
    }

    public function testimonial()
    {
        $testimonials = Testimonial::where('published', 1)->latest()->take('3')->get();
       // $testimonials = Testimonial::where('published', 1)->get();
        return view('public.testimonial', compact('testimonials'));

        // return view('public.testimonial');
    }

    public function topicdetails(String $id)
    {
        $topic = Topic::findOrFail($id);

        return view('public.topic-detail', compact('topic'));

        //return view('public.topic-detail');
    }

    public function topiclisting()
    {
        // $topics=$this->topicData();
        return view('public.topic-listing', compact('topics'));
    }

    public function category()
    {

        $categories = Category::get();
        return view('public.category', compact('categories'));
    }

    //     public function show(string $id)
    //     {
    //         $topic= Topic::where('published', '=', 1)->find($id);
    //         return view('public.job-detail', compact('topic'));
    //     }

    //     public function jobscategories()
    //     {
    //         $categories = Category::with(['jobs' => function ($query) { $query->where('published', 1)->take(3); }])->limit(4)->get();
    //         // dd($categories);
    //        // return view('public.pages.jobs_categories', compact('categories'));
    //         return view('public.pages.jobs', compact('categories'));
    //     }

    // public function topicData(){
    //     $design = Topic::where('published', 1)->where('design',1)->get();
    //     $markting = Topic::where('published', 1)->where('markting')->get();
    //     $finance = Topic::where('published', 1)->where('finance')->get();
    //     $music = Topic::where('published', 1)->where('music')->get();
    //     $education = Topic::where('published', 1)->where('education')->get();
    //     $topics=['design'=>$design,'markting'=>$markting,'finance'=>$finance,'music'=>$music,'education'=>$education];
    //     return $topics;
    // }
}
