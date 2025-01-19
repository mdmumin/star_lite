<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFaq\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update{

    public static function execute($model)
    {
        $propertyFaq = $model::find(request()->id);
    
        if (!$propertyFaq) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $rules = [
            'property_id' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
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
    
        $propertyFaq->property_id =  request()->property_id;
        $propertyFaq->title =  request()->title;
        $propertyFaq->description =  request()->description;
        $propertyFaq->creator = Auth::user()->id;
        $propertyFaq->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyFaq->status = request()->status ?? 1;
        
        $propertyFaq->update();
        
        return $propertyFaq;
    }
}
