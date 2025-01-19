<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanCategoryContent\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'property_floor_plan_category_id' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
            'thumb_image' => 'nullable',
            'additional_images' => 'nullable',
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

        $propertyFloorPlanCategoryContent = new $model();
        $propertyFloorPlanCategoryContent->property_id =  request()->property_id;
        $propertyFloorPlanCategoryContent->property_floor_plan_category_id =  request()->property_floor_plan_category_id;
        $propertyFloorPlanCategoryContent->title =  request()->title;
        $propertyFloorPlanCategoryContent->description =  request()->description;
         // Handle thumb_image upload
         if (request()->hasFile('thumb_image')) {
            $file = request()->file('thumb_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/property/property_content/' . $fileName);

            // Save and resize the thumb_image
            $file->move(public_path('upload/property/property_content'), $fileName);
            $thumb_image = Image::make($filePath);
            $thumb_image->resize(700, 400)->save($filePath);

            $propertyFloorPlanCategoryContent->thumb_image = 'upload/property/property_content/' . $fileName;
        } 

         // Handle thumb_image upload
         if (request()->hasFile('additional_images')) {
            $file = request()->file('additional_images');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/property/property_content/' . $fileName);

            // Save and resize the additional_images
            $file->move(public_path('upload/property/property_content'), $fileName);
            $additional_images = Image::make($filePath);
            $additional_images->resize(700, 400)->save($filePath);

            $propertyFloorPlanCategoryContent->additional_images = 'upload/property/property_content/' . $fileName;
        }
        $propertyFloorPlanCategoryContent->creator = Auth::user()->id;
        $propertyFloorPlanCategoryContent->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyFloorPlanCategoryContent->status = request()->status ?? 1;
        $propertyFloorPlanCategoryContent->save();

        return api_response(
            data: $propertyFloorPlanCategoryContent,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
