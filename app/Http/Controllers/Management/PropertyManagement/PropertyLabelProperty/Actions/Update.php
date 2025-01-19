<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyLabelProperty\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update{

    public static function execute($model)
    {
        $propertyLabelProperty = $model::find(request()->id);
    
        if (!$propertyLabelProperty) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'property_id' => 'required',
            'property_label_id' => 'nullable',
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
    
        $propertyLabelProperty->property_id =  request()->property_id;
        $propertyLabelProperty->property_label_id =  request()->property_label_id;
        $propertyLabelProperty->creator = Auth::user()->id;
        $propertyLabelProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyLabelProperty->status = request()->status ?? 1;
        
        $propertyLabelProperty->update();
        
        return $propertyLabelProperty;
    }
}
