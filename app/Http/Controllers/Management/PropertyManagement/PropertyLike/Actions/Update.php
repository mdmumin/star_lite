<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyLike\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update{

    public static function execute($model)
    {
        $propertyLike = $model::find(request()->id);
    
        if (!$propertyLike) {
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
            'date' => 'nullable',
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
    
        $propertyLike->user_id =  request()->user_id;
        $propertyLike->property_id =  request()->property_id;
        $propertyLike->date = Carbon::now()->toDateString();
        $propertyLike->creator = Auth::user()->id;
        $propertyLike->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyLike->status = request()->status ?? 1;
        
        $propertyLike->update();
        
        return $propertyLike;
    }
}
