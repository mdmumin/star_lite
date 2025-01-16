<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyLabel\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $propertyCategory = new $model();
        $propertyCategory->title =  request()->title;
        $propertyCategory->creator = Auth::user()->id;
        $propertyCategory->slug = request()->title . '-' . rand(99990, 100000);
        $propertyCategory->status = request()->status ?? 1;
        $propertyCategory->save();

        return api_response(
            data: $propertyCategory,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
