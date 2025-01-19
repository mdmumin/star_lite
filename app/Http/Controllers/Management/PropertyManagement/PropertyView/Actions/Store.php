<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyView\Actions;

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
            'total_count' => 'nullable',
            'ip' => 'nullable',
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

        $propertyView = new $model();
        $propertyView->user_id =  request()->user_id;
        $propertyView->property_id =  request()->property_id;
        $propertyView->date = Carbon::now()->toDateString();
        $propertyView->total_count =  request()->total_count;
        $propertyView->ip =  request()->ip;
        $propertyView->creator = Auth::user()->id;
        $propertyView->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyView->status = request()->status ?? 1;
        $propertyView->save();

        return api_response(
            data: $propertyView,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
