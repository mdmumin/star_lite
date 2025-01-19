<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyDetailsTitle\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'title' => 'required',
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

        $propertyDetailsTitle = new $model();
        $propertyDetailsTitle->property_id =  request()->property_id;
        $propertyDetailsTitle->title =  request()->title;
        $propertyDetailsTitle->creator = Auth::user()->id;
        $propertyDetailsTitle->slug = request()->title . '-' . rand(90000, 100000);
        $propertyDetailsTitle->status = request()->status ?? 1;
        $propertyDetailsTitle->save();

        return api_response(
            data: $propertyDetailsTitle,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
