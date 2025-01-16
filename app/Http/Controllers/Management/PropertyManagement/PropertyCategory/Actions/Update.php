<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update{

    public static function execute($model)
    {
        $propertyCategory = $model::find(request()->id);
    
        if (!$propertyCategory) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'title' => 'required',
            'image' => 'nullable',
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
    
        $propertyCategory->title =  request()->title;
        // Handle image upload
        if (request()->hasFile('image')) {
            if ($propertyCategory->image && file_exists(public_path($propertyCategory->image))) {
                unlink(public_path($propertyCategory->image));
            }

            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/property_category/' . $fileName;

            Image::make($file)
                ->fit(700, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($filePath), 90);

            $propertyCategory->image = $filePath;
        }
        $propertyCategory->update();
        
        return $propertyCategory;
    }
}
