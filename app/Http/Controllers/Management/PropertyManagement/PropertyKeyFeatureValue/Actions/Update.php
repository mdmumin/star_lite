<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyKeyFeatureValue\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update{

    public static function execute($model)
    {
        $propertyKeyFeatureValue = $model::find(request()->id);
    
        if (!$propertyKeyFeatureValue) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'property_id' => 'required',
            'property_key_feature_id' => 'nullable',
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
    
        $propertyKeyFeatureValue->property_id =  request()->property_id;
        $propertyKeyFeatureValue->property_key_feature_id =  request()->property_key_feature_id;
        $propertyKeyFeatureValue->title =  request()->title;
        $propertyKeyFeatureValue->value =  request()->value;
        $propertyKeyFeatureValue->type =  request()->type;
        $propertyKeyFeatureValue->creator = Auth::user()->id;
        $propertyKeyFeatureValue->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyKeyFeatureValue->status = request()->status ?? 1;
        
        $propertyKeyFeatureValue->update();
        
        return $propertyKeyFeatureValue;
    }
}
