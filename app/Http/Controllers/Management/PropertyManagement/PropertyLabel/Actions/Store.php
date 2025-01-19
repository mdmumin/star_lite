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

        $propertyLabel = new $model();
        $propertyLabel->title =  request()->title;
        $propertyLabel->creator = Auth::user()->id;
        $propertyLabel->slug = request()->title . '-' . rand(90000, 100000);
        $propertyLabel->status = request()->status ?? 1;
        $propertyLabel->save();

        return api_response(
            data: $propertyLabel,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
