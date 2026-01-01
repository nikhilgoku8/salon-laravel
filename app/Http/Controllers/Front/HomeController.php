<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function about_us()
    {
        return view('front.about-us');
    }

    public function blogs()
    {
        return view('front.blogs');
    }

    public function contact_us()
    {
        return view('front.contact-us');
    }

    public function service()
    {
        return view('front.service');
    }

    public function single_blog()
    {
        return view('front.the-right-way-to-prep-for-a-facial');
    }
}
