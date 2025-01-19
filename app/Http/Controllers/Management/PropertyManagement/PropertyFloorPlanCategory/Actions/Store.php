<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanCategory\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'title' => 'required',
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

        $propertyFloorPlanCategory = new $model();
        $propertyFloorPlanCategory->property_id =  request()->property_id;
        $propertyFloorPlanCategory->title =  request()->title;
        $propertyFloorPlanCategory->creator = Auth::user()->id;
        $propertyFloorPlanCategory->slug = request()->title . '-' . rand(90000, 100000);
        $propertyFloorPlanCategory->status = request()->status ?? 1;
        $propertyFloorPlanCategory->save();

        return api_response(
            data: $propertyFloorPlanCategory,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
