<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{

    public function topics()
    {
        return view('admin.topics.topics');
    }

    public function addtopic()
    {
        return view('admin.topics.add_topic');
    }

    public function edittopic()
    {
        return view('admin.topics.edit_topic');
    }


    public function topicdetails()
    {
        return view('admin.topics.topic_details');
    }

    public function categories()
    {
        return view('admin.category.categories');
    }

    public function addcategory()
    {
        return view('admin.category.add_category');
    }


    public function editcategory()
    {
        return view('admin.category.edit_category');
    }


    public function messages()
    {
        return view('admin.messages.messages');
    }


    public function messagedetails()
    {
        return view('admin.messages.message_details');
    }

    public function testimonials()
    {
        return view('admin.testimonials.testimonials');
    }

    public function addtestimonial()
    {
        return view('admin.testimonials.add_testimonial');
    }



    public function edittestimonial()
    {
        return view('admin.testimonials.edit_testimonial');
    }

    public function users()
    {
        return view('admin.users.users');
    }

    public function edituser()
    {
        return view('admin.users.edit_user');
    }

    public function adduser()
    {
        return view('admin.users.add_user');
    }
}
