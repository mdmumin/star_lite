<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyGallary\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{

    public static function execute($model)
    {
        $propertyGallary = $model::find(request()->id);

        if (!$propertyGallary) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }

        $rules = [
            'property_id' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'is_featured' => 'nullable',
            'status' => 'nullable|in:0,1'
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }
        $propertyGallary->property_id =  request()->property_id;
        $propertyGallary->title =  request()->title;
        $propertyGallary->description =  request()->description;
        // Handle image upload
        if (request()->hasFile('image')) {
            if ($propertyGallary->image && file_exists(public_path($propertyGallary->image))) {
                unlink(public_path($propertyGallary->image));
            }

            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/property/gallary/' . $fileName;

            Image::make($file)
                ->fit(700, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($filePath), 90);

            $propertyGallary->image = $filePath;
        }
        $propertyGallary->is_featured =  request()->is_featured;;
        $propertyGallary->creator = Auth::user()->id;
        $propertyGallary->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyGallary->status = request()->status ?? 1;

        $propertyGallary->update();

        return $propertyGallary;
    }
}
