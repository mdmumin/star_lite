<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update{

    public static function execute($model)
    {
        $propertyTag = $model::find(request()->id);
    
        if (!$propertyTag) {
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
    
        $propertyTag->title =  request()->title;
        $propertyTag->creator = Auth::user()->id;
        $propertyTag->slug = request()->title . '-' . rand(90000, 100000);
        $propertyTag->status = request()->status ?? 1;
        $propertyTag->update();
        
        return $propertyTag;
    }
}
