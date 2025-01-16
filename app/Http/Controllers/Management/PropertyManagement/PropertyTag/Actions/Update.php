<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions;

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
            'title' => 'required',
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
    
        $propertyCategory->title =  request()->title;
        $propertyCategory->creator = Auth::user()->id;
        $propertyCategory->slug = request()->title . '-' . rand(99990, 100000);
        $propertyCategory->status = request()->status ?? 1;
        $propertyCategory->update();
        
        return $propertyCategory;
    }
}
