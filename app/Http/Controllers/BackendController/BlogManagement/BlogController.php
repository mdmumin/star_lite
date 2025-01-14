<?php

namespace App\Http\Controllers\BackendController\BlogManagement;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $response = Http::get('/api/v1/blog/all'); // Replace with your actual API URL

        // Check if the request was successful
        if ($response->successful()) {
            $blogs = $response->json(); // Decode the JSON response into an array
dd($blogs);
            // Do something with the blogs, like return a view or JSON response
            return view('blogs.index', compact('blogs'));
        }
        dd('data not found');
        // return view('backend.pages.blog_management.blog.index');
    }
}
