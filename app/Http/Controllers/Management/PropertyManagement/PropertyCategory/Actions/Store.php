<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'image' => 'nullable',
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

        $propertyCategory = new $model();
        $propertyCategory->title =  request()->title;
        // Handle image upload
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/property/property_category/' . $fileName);

            // Save and resize the image
            $file->move(public_path('upload/property/property_category'), $fileName);
            $image = Image::make($filePath);
            $image->resize(700, 400)->save($filePath);

            $propertyCategory->image = 'upload/property/property_category/' . $fileName;
        }
        $propertyCategory->creator = Auth::user()->id;
        $propertyCategory->slug = request()->title . '-' . rand(90000, 100000);
        $propertyCategory->status = request()->status ?? 1;
        $propertyCategory->save();

        return api_response(
            data: $propertyCategory,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
