<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function about()
    {
        return view('about');
    }
}
