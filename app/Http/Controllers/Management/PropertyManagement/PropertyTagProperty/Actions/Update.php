<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyTagProperty\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update{

    public static function execute($model)
    {
        $propertyTagProperty = $model::find(request()->id);
    
        if (!$propertyTagProperty) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'property_id' => 'required',
            'property_tag_id' => 'nullable',
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
    
        $propertyTagProperty->property_id =  request()->property_id;
        $propertyTagProperty->property_tag_id =  request()->property_tag_id;
        $propertyTagProperty->creator = Auth::user()->id;
        $propertyTagProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyTagProperty->status = request()->status ?? 1;
        
        $propertyTagProperty->update();
        
        return $propertyTagProperty;
    }
}
