<?php

namespace App\Http\Controllers\Management\UserManagement\User\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        $data = $model::find(request()->id);

        if (!$data) {
            return api_response(
                data: [],
                code: 404,
                message: 'User not found',
                errors: ['name' => ['No data found for the provided ID.']],
            );
        }

        $rules = [
            'name' => ['required'],
            'role_serial' => ['required'],
            'email' => ['nullable', 'email'],
            'phone_number' => ['nullable', 'numeric'],
            'image' => ['nullable'],
            'status' => ['nullable', 'in:0,1'],
        ];    
       $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'Validation error',
                errors: $validator->errors(),
            );
        }

        // Update the user fields
        $data->name = request()->name;
        $data->role_serial = request()->role_serial;
        $data->email = request()->email;
        $data->phone_number = request()->phone_number;
        $data->status = request()->status ?? 1; 

        // Update password only if it's provided
        if (request()->has('password') && request()->password) {
            $data->password = bcrypt(request()->password); // Hash password
        }

        if (request()->hasFile('image')) {

            if (!empty($user->image) && file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }


            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/user/' . $fileName;


            Image::make($file)
                ->fit(700, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($filePath), 100);
            $data->image = $filePath;
        }

        $data->creator = Auth::user()->id ?? null; 
        $data->save();

        // Return the updated data
        return $data;
    }
}
