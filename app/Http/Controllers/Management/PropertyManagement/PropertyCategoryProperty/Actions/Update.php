<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update{

    public static function execute($model)
    {
        $propertyCategoryProperty = $model::find(request()->id);
    
        if (!$propertyCategoryProperty) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'property_id' => 'required',
            'property_category_id' => 'nullable',
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
    
        $propertyCategoryProperty->property_id =  request()->property_id;
        $propertyCategoryProperty->property_category_id =  request()->property_category_id;
        $propertyCategoryProperty->creator = Auth::user()->id;
        $propertyCategoryProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyCategoryProperty->status = request()->status ?? 1;
        
        $propertyCategoryProperty->update();
        
        return $propertyCategoryProperty;
    }
}
