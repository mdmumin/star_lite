<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'image' => 'nullable',
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
        $propertyCategory->creator = Auth::user()->id ?? null;
        $propertyCategory->status = request()->status ?? 1;
        $propertyCategory->slug = request()->title . '-' . rand(90000, 100000);
        $propertyCategory->save();

        return api_response(
            data: $propertyCategory,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
