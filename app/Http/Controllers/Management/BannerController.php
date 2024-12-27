<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Management\Banner ;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home_banner = Banner::get();
        return view('backend.pages.banner.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.banner.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'sort_descripton' => 'required',
            'video_url' => 'required',
            'button_title' => 'required',
            'button_url' => 'required',
            'slug' => 'required',
            'status' => 'required',
            // 'password' => 'required', 'string', 'min:8', 'confirmed',

        ]);


        $home_banner = new Banner();
        $home_banner->title = $request->title;
        $home_banner->sub_title = $request->sub_title;
        $home_banner->sort_descripton = $request->sort_descripton;
        $home_banner->video_url = $request->video_url;
        $home_banner->button_title = $request->video_url;
        $home_banner->button_url = $request->button_url;
        $home_banner->creator = Auth::user()->id;
        $home_banner->slug = $request->slug;
        $home_banner->status = $request->status;
        $home_banner->created_at = Carbon::now()->toDateString();
        $home_banner->creator = Auth::user()->id;
        $home_banner->save();
        return redirect()->back()->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }
}
