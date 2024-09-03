<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
         return view('public.index');
     }

     public function contact()
     {
          return view('public.contact');
      }
     
      public function testimonial()
      {
           return view('public.testimonial');
       }

       public function topicdetails()
       {
            return view('public.topic-details');
        }

        public function topiclisting()
        {
             return view('public.topic-listing');
         }

 

}
