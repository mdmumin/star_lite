<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyLabelProperty\Actions;

use Illuminate\Support\Facades\Auth;
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
            'property_id' => 'required',
            'property_label_id' => 'required',
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
    
        $propertyCategoryProperty = new $model();
        $propertyCategoryProperty->property_id =  request()->property_id;
        $propertyCategoryProperty->property_label_id =  request()->property_label_id;
        $propertyCategoryProperty->creator = Auth::user()->id;
        $propertyCategoryProperty->slug = request()->property_id . '-' . rand(99990, 100000);
        $propertyCategoryProperty->status = request()->status ?? 1;
        $propertyCategory->update();
        
        return $propertyCategory;
    }
}
