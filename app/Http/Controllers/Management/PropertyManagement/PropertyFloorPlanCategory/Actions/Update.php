<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanCategory\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update{

    public static function execute($model)
    {
        $propertyFloorPlanCategory = $model::find(request()->id);
    
        if (!$propertyFloorPlanCategory) {
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
    
        $propertyFloorPlanCategory->property_id =  request()->property_id;
        $propertyFloorPlanCategory->title =  request()->title;
        $propertyFloorPlanCategory->creator = Auth::user()->id;
        $propertyFloorPlanCategory->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyFloorPlanCategory->status = request()->status ?? 1;
        
        $propertyFloorPlanCategory->update();
        
        return $propertyFloorPlanCategory;
    }
}
