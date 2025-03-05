<?php

namespace App\Http\Controllers\Management\CommonManagement\Testimonial\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'designation' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'comment' => 'nullable',
            'status' => 'nullable|in:0,1'
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $testimonial = new $model();
        $testimonial->name = request()->name;
        $testimonial->designation = request()->designation;

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/testimonials/' . $fileName);

            $file->move(public_path('upload/testimonials'), $fileName);
            $image = Image::make($filePath);
            $image->resize(700, 400)->save($filePath);

            $testimonial->image = 'upload/testimonials/' . $fileName;
        }

        $testimonial->comment = request()->comment;
        $testimonial->creator = Auth::user()->id ?? null;
        $testimonial->status = request()->status ?? 1;
        $testimonial->slug = request()->name . '-' . rand(90000, 100000);

        $testimonial->save();

        return api_response(
            data: $testimonial,
            code: 201,
            message: 'Team member created successfully',
            errors: [],
        );
    }
}
