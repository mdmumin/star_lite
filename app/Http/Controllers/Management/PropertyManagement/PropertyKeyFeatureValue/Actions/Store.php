<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyKeyFeatureValue\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'property_key_feature_id' => 'nullable',
            'icon' => 'nullable',
            'title' => 'nullable',
            'value' => 'nullable',
            'type' => 'nullable',
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

        $propertyKeyFeatureValue = new $model();
        $propertyKeyFeatureValue->property_id =  request()->property_id;
        $propertyKeyFeatureValue->property_key_feature_id =  request()->property_key_feature_id;
        $propertyKeyFeatureValue->icon =  request()->icon;
        $propertyKeyFeatureValue->title =  request()->title;
        $propertyKeyFeatureValue->value =  request()->value;
        $propertyKeyFeatureValue->type =  request()->type;;
        $propertyKeyFeatureValue->creator = Auth::user()->id;
        $propertyKeyFeatureValue->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyKeyFeatureValue->status = request()->status ?? 1;
        $propertyKeyFeatureValue->save();

        return api_response(
            data: $propertyKeyFeatureValue,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
