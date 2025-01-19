<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanCategoryContent\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update{

    public static function execute($model)
    {
        $propertyFloorPlanCategoryContent = $model::find(request()->id);
    
        if (!$propertyFloorPlanCategoryContent) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'property_id' => 'required',
            'property_floor_plan_category_id' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
            'thumb_image' => 'nullable',
            'additional_images' => 'nullable',
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
    
        $propertyFloorPlanCategoryContent->property_id =  request()->property_id;
        $propertyFloorPlanCategoryContent->property_floor_plan_category_id =  request()->property_floor_plan_category_id;
        $propertyFloorPlanCategoryContent->title =  request()->title;
        $propertyFloorPlanCategoryContent->description =  request()->description;
        // Handle thumb_image upload
        if (request()->hasFile('thumb_image')) {
            if ($propertyFloorPlanCategoryContent->thumb_image && file_exists(public_path($propertyFloorPlanCategoryContent->thumb_image))) {
                unlink(public_path($propertyFloorPlanCategoryContent->thumb_image));
            }

            $file = request()->file('thumb_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/property/property_content/' . $fileName;

            Image::make($file)
                ->fit(700, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($filePath), 90);

            $propertyFloorPlanCategoryContent->thumb_image = $filePath;
        }

        if (request()->hasFile('additional_images')) {
            if ($propertyFloorPlanCategoryContent->additional_images && file_exists(public_path($propertyFloorPlanCategoryContent->additional_images))) {
                unlink(public_path($propertyFloorPlanCategoryContent->additional_images));
            }

            $file = request()->file('additional_images');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/property/property_content/' . $fileName;

            Image::make($file)
                ->fit(700, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($filePath), 90);

            $propertyFloorPlanCategoryContent->additional_images = $filePath;
        }
        $propertyFloorPlanCategoryContent->creator = Auth::user()->id;
        $propertyFloorPlanCategoryContent->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyFloorPlanCategoryContent->status = request()->status ?? 1;
        
        $propertyFloorPlanCategoryContent->update();
        
        return $propertyFloorPlanCategoryContent;
    }
}
