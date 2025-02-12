<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyLabel\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update{

    public static function execute($model)
    {
        $propertyLabel = $model::find(request()->id);
    
        if (!$propertyLabel) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'title' => 'required',
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
    
        $propertyLabel->title =  request()->title;
        $propertyLabel->creator = Auth::user()->id?? null;
        $propertyLabel->status = request()->status ?? 1;
        $propertyLabel->update();
        
        return $propertyLabel;
    }
}
