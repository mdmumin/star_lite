<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyDetailsTitleValue\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update{

    public static function execute($model)
    {
        $propertyDetailsTitleValue = $model::find(request()->id);
    
        if (!$propertyDetailsTitleValue) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'property_id' => 'required',
            'property_details_title_id' => 'nullable',
            'value' => 'nullable',
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
    
        $propertyDetailsTitleValue->property_id =  request()->property_id;
        $propertyDetailsTitleValue->property_details_title_id =  request()->property_details_title_id;
        $propertyDetailsTitleValue->value =  request()->value;
        $propertyDetailsTitleValue->creator = Auth::user()->id;
        $propertyDetailsTitleValue->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyDetailsTitleValue->status = request()->status ?? 1;
        
        $propertyDetailsTitleValue->update();
        
        return $propertyDetailsTitleValue;
    }
}
