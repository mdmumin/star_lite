<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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

        $propertyTag = new $model();
        $propertyTag->title =  request()->title;
        $propertyTag->creator = Auth::user()->id;
        $propertyTag->slug = request()->title . '-' . rand(90000, 100000);
        $propertyTag->status = request()->status ?? 1;
        $propertyTag->save();

        return api_response(
            data: $propertyTag,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
