<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyDetailsTitle\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update{

    public static function execute($model)
    {
        $propertyDetailsTitle = $model::find(request()->id);
    
        if (!$propertyDetailsTitle) {
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
    
        $propertyDetailsTitle->property_id =  request()->property_id;
        $propertyDetailsTitle->title =  request()->title;
        $propertyDetailsTitle->creator = Auth::user()->id;
        $propertyDetailsTitle->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyDetailsTitle->status = request()->status ?? 1;
        
        $propertyDetailsTitle->update();
        
        return $propertyDetailsTitle;
    }
}
