<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyLabelProperty\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'property_label_id' => 'required',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $propertyLabelProperty = new $model();
        $propertyLabelProperty->property_id =  request()->property_id;
        $propertyLabelProperty->property_label_id =  request()->property_label_id;
        $propertyLabelProperty->creator = Auth::user()->id;
        $propertyLabelProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyLabelProperty->status = request()->status ?? 1;
        $propertyLabelProperty->save();

        return api_response(
            data: $propertyLabelProperty,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
