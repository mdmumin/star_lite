<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin\UserManagement\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::active()->with('user_role')->paginate(10);
        return view('backend.pages.users.index', compact('user'));
    }

    public function search(Request $request){
        $search = $request->input('search');

        $user = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(2); 
    
        return view('backend.pages.users.index', compact('user'));
       
    }
    // public function search(Request $request){
    //     $user = User::where('name', 'LIKE', '%'. $request->search_string .'%')
    //     ->orWhere('email', 'LIKE', '%'. $request->search_string .'%')
    //     ->orWhere('phone_number', 'LIKE', '%'. $request->search_string .'%')
    //     ->orWhere('id','desc')
    //     ->paginate(2);
    //     if ($user->count() >=1) {
    //         return view('backend.pages.users.index', compact('user'))->render();
    //     }
    //     else{
    //         return response()->json([
    //             'status'=>'nothing_found'
    //         ]);
    //     }
    // }
    public function create()
    {
        $user_roles = UserRole::orderBy('role_serial', 'DESC')->get();
        return view('backend.pages.users.create', compact('user_roles'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'role_serial' => 'required',
            'email' => 'required|unique:user_roles,role_serial',
            'phone' => 'required',
            'password' => 'required',
            'string',
            'min:8',
            'confirmed',
            'image' => 'required',
            'image'
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->role_serial = $request->role_serial;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now()->toDateString();
        $user->creator = Auth::user()->id;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/user'), $fileName);
            $image = Image::make(public_path('upload/user/' . $fileName));
            $image->resize(300, 200);
            $image->save(public_path('upload/user/' . $fileName));
            $user->image = 'upload/user/' . $fileName;
        }
        $user->save();
        return redirect()->back()->with('success', 'Success!');
    }

    public function edit($id)
    {
        $user_roles = UserRole::orderBy('role_serial', 'DESC')->get();
        $user = User::find($id);
        return view('backend.pages.users.edit', compact('user_roles', 'user'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'role_serial' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'image'
        ]);


        $user = User::find($request->id);

        if ($user->email != $request->email) {
            $this->validate($request, [
                'email' => ['required', 'unique:users,email,' . $user->id],
            ]);
            $user->email = $request->email;
        }
        $user->name = $request->name;
        $user->role_serial = $request->role_serial;
        $user->phone_number = $request->phone;
        $user->created_at = Carbon::now()->toDateString();
        $user->creator = Auth::user()->id;
        $user->update();


        if ($request->hasFile('image')) {

            if (!empty($user->image) && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }


            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();


            $image = Image::make($file)
                ->fit(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path('upload/user/' . $fileName), 100);


            $user->image = 'upload/user/' . $fileName;


            $user->update();
        }

        return redirect()->back()->with('success', 'Success!');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
        return redirect()->back()->with('success', 'Success!');
    }
}
