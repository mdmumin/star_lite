<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyGallary\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'is_featured' => 'nullable',
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

        $propertyRelatedProperty = new $model();
        $propertyRelatedProperty->property_id =  request()->property_id;
        $propertyRelatedProperty->title =  request()->title;
        $propertyRelatedProperty->description =  request()->description;

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/property/gallary/' . $fileName);

            // Save and resize the image
            $file->move(public_path('upload/property/gallary'), $fileName);
            $image = Image::make($filePath);
            $image->resize(700, 400)->save($filePath);

            $propertyRelatedProperty->image = 'upload/property/gallary/' . $fileName;
        }
        $propertyRelatedProperty->is_featured =  request()->is_featured;;
        $propertyRelatedProperty->creator = Auth::user()->id;
        $propertyRelatedProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyRelatedProperty->status = request()->status ?? 1;
        $propertyRelatedProperty->save();

        return api_response(
            data: $propertyRelatedProperty,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
