<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('frontend.pages.gallery.gallery');
    }
    public function image()
    {
        return view('frontend.pages.gallery.image.image');
    } 
    public function video()
    {
        return view('frontend.pages.gallery.video.video');
    } 
}
