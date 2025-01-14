<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Backend\Admin\UserManagement\UserRole;
use App\Models\Management\Banner ;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $user = User::active()->with('user_role')->paginate(10);
        return view('backend.pages.banner.index', compact('user'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $user = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('backend.pages.users.index', compact('user'));
    }

    public function create()
    {
        return view('backend.pages.banner.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'short_description' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
            'status' => 'required',

        ]);
      
        $home_banner = new Banner();
        $home_banner->title = $request->title;
        $home_banner->sub_title = $request->subtitle;
        $home_banner->short_descripton = $request->short_description;
        $home_banner->button_text = $request->button_text;
        $home_banner->button_url = $request->button_url;
        $home_banner->creator = Auth::user()->id;
        $home_banner->slug = $request->title .'-'.rand(99990,100000);
        $home_banner->status = $request->status;
        $home_banner->created_at = Carbon::now()->toDateString();
        $home_banner->creator = Auth::user()->id;

       
        $home_banner->save();
        return redirect()->back()->with('success', 'Success!');
        
    }

    public function edit($id)
    {
        $home_banner = Banner::find($id);
        return view('backend.pages.banner.edit', compact('home_banner'));
    }


   
}
