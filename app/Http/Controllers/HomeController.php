<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::latest()->take(3)->get();
        return view('pages.home', compact('latestNews'));
    }
}
