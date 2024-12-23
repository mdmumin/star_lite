<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin\UserManagement\UserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('user_role')->get();
        return view('backend.pages.users.index', compact('user'));
    }
    public function create()
    {
        $user_roles = UserRole::orderBy('role_serial','DESC')->get();
        return view('backend.pages.users.create', compact('user_roles'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'role_serial' => 'required',
            'email' => 'required|unique:user_roles,role_serial',
            'phone' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'image' => 'required','image'
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
            $user->image = 'upload/user/' . $fileName;
        }
        $user->save();
        return redirect()->back()->with('success', 'Success!');
    }

    public function edit($id)
    {
        $user_roles = UserRole::orderBy('role_serial','DESC')->get();
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
            'image' => 'required','image'
        ]);


        $user = User::find($request->id);

        if ($user->email != $request->email) {
            $this->validate($request, [
                 'email' => ['required','unique:users,email,'.$user->id],
            ]);
            $user->email = $request->email;
        }
        $user->name = $request->name;
        $user->role_serial = $request->role_serial;
        $user->phone_number = $request->phone;
        $user->created_at = Carbon::now()->toDateString();
        $user->creator = Auth::user()->id;
        $user->update();
 

        if($request->hasFile('image')){
            if (file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName(); 
            $file->move(public_path('upload/user'), $fileName);
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
