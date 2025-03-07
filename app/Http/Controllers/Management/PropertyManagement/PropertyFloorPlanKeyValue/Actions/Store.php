<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'required',
            'property_floor_plan_category_id' => 'nullable',
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

        $propertyRelatedProperty = new $model();
        $propertyRelatedProperty->property_id =  request()->property_id;
        $propertyRelatedProperty->property_floor_plan_category_id =  request()->property_floor_plan_category_id;
        $propertyRelatedProperty->title =  request()->title;
        $propertyRelatedProperty->value =  request()->value;
        $propertyRelatedProperty->type =  request()->type;;
        $propertyRelatedProperty->creator = Auth::user()->id;
        $propertyRelatedProperty->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyRelatedProperty->status = request()->status ?? 1;
        $propertyRelatedProperty->save();

        return api_response(
            data: $propertyRelatedProperty,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
