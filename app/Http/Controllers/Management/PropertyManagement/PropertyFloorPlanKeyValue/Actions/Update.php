<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update{

    public static function execute($model)
    {
        $propertyRelatedProperty = $model::find(request()->id);
    
        if (!$propertyRelatedProperty) {
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
            'value' => 'nullable',
            'type' => 'nullable',
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
    
        $propertyRelatedProperty->property_id =  request()->property_id;
        $propertyRelatedProperty->property_floor_plan_category_id =  request()->property_floor_plan_category_id;
        $propertyRelatedProperty->title =  request()->title;
        $propertyRelatedProperty->value =  request()->value;
        $propertyRelatedProperty->type =  request()->type;
        $propertyRelatedProperty->creator = Auth::user()->id;
        $propertyRelatedProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyRelatedProperty->status = request()->status ?? 1;
        
        $propertyRelatedProperty->update();
        
        return $propertyRelatedProperty;
    }
}
