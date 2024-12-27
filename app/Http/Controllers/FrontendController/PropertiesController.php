<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index()
    {
        return view('frontend.pages.properties.properties');
    }
    public function luxury()
    
    {
        return view('frontend.pages.properties.luxury.luxury');
    }
    public function comercial()
    {
        return view('frontend.pages.properties.comercial.comercial');
    }
    public function classic()
    {
        return view('frontend.pages.properties.classic.classic');
    }
    public function wellness()
    {
        return view('frontend.pages.properties.wellness.wellness');
    }
    public function ongoing()
    {
        return view('frontend.pages.properties.ongoing.ongoing');
    }
    public function upgoing()
    {
        return view('frontend.pages.properties.upgoing.upgoing');
    }
    public function completed()
    {
        return view('frontend.pages.properties.completed.completed');
    }
    public function details()
    {
        return view('frontend.pages.properties.property_details.property_details');
    }

}
