<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('frontend.pages.news.news');
    }
    public function news_details()
    {
        return view('frontend.pages.news.news_details.news_details');
    }
}
