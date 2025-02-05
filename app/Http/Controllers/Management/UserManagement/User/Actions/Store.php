<?php

namespace App\Http\Controllers\Management\UserManagement\User\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Store
{

    public static function execute($model)
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'name' => ['required'],
            'role_serial' => ['required'],
            'email' => ['nullable'],
            'email_verified_at' => ['nullable'],
            'phone_number' => ['nullable'],
            'image' => ['nullable'],
            'password' => ['nullable'],
            'creator' => ['nullable'],
            'status' => ['nullable'],
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $data = new $model();
        $data->name = request()->name;
        $data->role_serial = request()->role_serial;
        $data->email = request()->email;
        $data->email_verified_at = request()->email_verified_at ?? null;
        $data->phone_number = request()->phone_number;
        $data->password = request()->password;
        $data->creator = Auth::user()->id ?? null;
        $data->status = request()->status ?? 1;

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/user/' . $fileName);

            $file->move(public_path('upload/user'), $fileName);
            $coverImage = Image::make($filePath);
            $coverImage->resize(700, 400)->save($filePath);

            $data->image = 'upload/user/' . $fileName;
        }

        $data->save();

        return api_response(
            data: $data,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
