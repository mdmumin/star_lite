<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'property_category_id' => 'required',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $propertyCategoryProperty = new $model();
        $propertyCategoryProperty->property_id =  request()->property_id;
        $propertyCategoryProperty->property_category_id =  request()->property_category_id;
        $propertyCategoryProperty->creator = Auth::user()->id;
        $propertyCategoryProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyCategoryProperty->status = request()->status ?? 1;
        $propertyCategoryProperty->save();

        return api_response(
            data: $propertyCategoryProperty,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
