<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyDetailsTitleValue\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'property_details_title_id' => 'nullable',
            'value' => 'nullable',
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

        $propertyDetailsTitleValue = new $model();
        $propertyDetailsTitleValue->property_id =  request()->property_id;
        $propertyDetailsTitleValue->property_details_title_id =  request()->property_details_title_id;
        $propertyDetailsTitleValue->value =  request()->value;
        $propertyDetailsTitleValue->creator = Auth::user()->id;
        $propertyDetailsTitleValue->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyDetailsTitleValue->status = request()->status ?? 1;
        $propertyDetailsTitleValue->save();

        return api_response(
            data: $propertyDetailsTitleValue,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
