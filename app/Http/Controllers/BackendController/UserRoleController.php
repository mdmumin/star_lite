<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin\UserManagement\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        $user_role = UserRole::get();
        return view('backend.pages.user_role.index', compact('user_role'));
    }
    public function create()
    {
        return view('backend.pages.user_role.create');
    }
    public function store(Request $request)
    {      
        $this->validate($request, [
            'title' => 'required',
            'serial' => 'required|unique:user_roles,role_serial',
        ]);


        $user_role = new UserRole();
        $user_role->title = $request->title;
        $user_role->role_serial = $request->serial;
        $user_role->save();
        return redirect()->back()->with('success', 'Success!');
    }

    public function edit($id)
    {
        $user_role = UserRole::find($id);
        return view('backend.pages.user_role.edit', compact('user_role'));
    }

    public function update(Request $request, $id)
    {
        $user_role = UserRole::find($id);

        $this->validate($request,[
            'title' => 'required',
            'serial' => 'required|unique:user_roles,role_serial,'.$user_role->id,
        ]);


        $user_role->title = $request->title;
        $user_role->role_serial = $request->serial;
        $user_role->update();
        return redirect()->back()->with('success', 'Success!');
                                                                 
    }

    public function delete($id)
    {
        $user_role = UserRole::find($id);
        $user_role->delete();
        return redirect()->back()->with('success', 'Success!');
    }
}
