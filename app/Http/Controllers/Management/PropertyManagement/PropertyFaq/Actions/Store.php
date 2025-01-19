<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFaq\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
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

        $propertyFaq = new $model();
        $propertyFaq->property_id =  request()->property_id;
        $propertyFaq->title =  request()->title;
        $propertyFaq->description =  request()->description;
        $propertyFaq->creator = Auth::user()->id;
        $propertyFaq->slug = request()->title . '-' . rand(90000, 100000);
        $propertyFaq->status = request()->status ?? 1;
        $propertyFaq->save();

        return api_response(
            data: $propertyFaq,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
