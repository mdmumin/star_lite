<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyLike\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'user_id' => 'nullable',
            'property_id' => 'nullable',
            'date' => 'nullable',
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

        $propertyLike = new $model();
        $propertyLike->user_id =  request()->user_id;
        $propertyLike->property_id =  request()->property_id;
        $propertyLike->date = Carbon::now()->toDateString();
        $propertyLike->creator = Auth::user()->id;
        $propertyLike->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyLike->status = request()->status ?? 1;
        $propertyLike->save();

        return api_response(
            data: $propertyLike,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
