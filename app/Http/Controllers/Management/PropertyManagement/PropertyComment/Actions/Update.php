<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyComment\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update{

    public static function execute($model)
    {
        $propertyComment = $model::find(request()->id);
    
        if (!$propertyComment) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'user_id' => 'nullable',
            'property_id' => 'nullable',
            'comment' => 'nullable',
            'parent_id' => 'nullable',
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
    
        $propertyComment->user_id =  request()->user_id;
        $propertyComment->property_id =  request()->property_id;
        $propertyComment->comment =  request()->comment;
        $propertyComment->parent_id =  request()->parent_id;
        $propertyComment->creator = Auth::user()->id;
        $propertyComment->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyComment->status = request()->status ?? 1;
        
        $propertyComment->update();
        
        return $propertyComment;
    }
}
