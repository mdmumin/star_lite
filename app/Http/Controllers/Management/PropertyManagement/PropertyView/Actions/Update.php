<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyView\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update
{

    public static function execute($model)
    {
        $propertyView = $model::find(request()->id);

        if (!$propertyView) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }

        $rules = [
            'user_id' => 'nullable',
            'property_id' => 'nullable',
            'date' => 'nullable',
            'total_count' => 'nullable',
            'ip' => 'nullable',
            'status' => 'nullable|in:0,1'
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $propertyView->user_id =  request()->user_id;
        $propertyView->property_id =  request()->property_id;
        $propertyView->date = Carbon::now()->toDateString();
        $propertyView->total_count =  request()->total_count;
        $propertyView->ip =  request()->ip;
        
        $propertyView->creator = Auth::user()->id;
        $propertyView->slug = request()->property_id . '-' . rand(90000, 100000);
        $propertyView->status = request()->status ?? 1;

        $propertyView->update();

        return $propertyView;
    }
}
