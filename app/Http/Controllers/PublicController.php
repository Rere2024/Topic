<?php

namespace App\Http\Controllers;


class PublicController extends Controller
{
    public function index()
    {
        return view('public.index');
    }

    public function contact()
    {
        return view('public.contact-us');
    }

    public function testimonial()
    {
        return view('public.testimonial');
    }

    public function topicdetails()
    {
        return view('public.topic-detail');
    }

    public function topiclisting()
    {
        return view('public.topic-listing');
    }
}
