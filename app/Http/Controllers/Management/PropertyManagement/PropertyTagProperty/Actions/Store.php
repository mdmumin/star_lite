<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyTagProperty\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'property_tag_id' => 'required',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $propertyTagProperty = new $model();
        $propertyTagProperty->property_id =  request()->property_id;
        $propertyTagProperty->property_tag_id =  request()->property_tag_id;
        $propertyTagProperty->creator = Auth::user()->id;
        $propertyTagProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyTagProperty->status = request()->status ?? 1;
        $propertyTagProperty->save();

        return api_response(
            data: $propertyTagProperty,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
