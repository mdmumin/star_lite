<?php

namespace App\Http\Controllers\Management\CommonManagement\Team\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required'],
            'designation' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'contact_number' => ['nullable'],
            'email' => ['required', 'email', 'max:100', 'unique:teams,email'],
            'short_description' => ['nullable'],
            'description' => ['nullable'],
            'facebook' => ['nullable'],
            'linkedin' => ['nullable'],
            'instagram' => ['nullable'],
            'whatsapp' => ['nullable'],
            'telegram' => ['nullable'],
            'status' => ['nullable', 'integer', 'in:0,1'],
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $team = new $model();
        $team->name = request()->name;
        $team->designation = request()->designation;

         // Handle cover image upload
         if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/teams/' . $fileName);

            // Save and resize the image
            $file->move(public_path('upload/teams'), $fileName);
            $image = Image::make($filePath);
            $image->resize(700, 400)->save($filePath);

            $team->image = 'upload/teams/' . $fileName;
        }

        $team->contact_number = request()->contact_number;
        $team->email = request()->email;
        $team->short_description = request()->short_description;
        $team->description = request()->description;
        $team->facebook = request()->facebook ?? '#';
        $team->linkedin = request()->linkedin ?? '#';
        $team->instagram = request()->instagram ?? '#';
        $team->whatsapp = request()->whatsapp ?? '#';
        $team->telegram = request()->telegram ?? '#';
        $team->creator = Auth::user()->id ?? null;
        $team->status = request()->status ?? 1;
        $team->slug = request()->name .'-'.rand(90000,100000);

        $team->save();

        return api_response(
            data: $team,
            code: 201,
            message: 'Team member created successfully',
            errors: [],
        );
    }
}
