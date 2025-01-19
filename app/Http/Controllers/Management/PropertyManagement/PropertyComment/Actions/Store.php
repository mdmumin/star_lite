<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyComment\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'user_id' => 'nullable',
            'property_id' => 'nullable',
            'comment' => 'nullable',
            'parent_id' => 'nullable',
            'status' => 'nullable|in:0,1'
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $propertyComment = new $model();
        $propertyComment->user_id =  request()->user_id;
        $propertyComment->property_id =  request()->property_id;
        $propertyComment->comment =  request()->comment;
        $propertyComment->parent_id =  request()->parent_id;
        $propertyComment->creator = Auth::user()->id;
        $propertyComment->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyComment->status = request()->status ?? 1;
        $propertyComment->save();

        return api_response(
            data: $propertyComment,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
