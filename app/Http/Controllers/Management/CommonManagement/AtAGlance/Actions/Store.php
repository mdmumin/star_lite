<?php

namespace App\Http\Controllers\Management\CommonManagement\AtAGlance\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'nullable',
            'amount' => 'nullable',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $glance = new $model();
        $glance->title = request()->title;
        $glance->icon = request()->icon;
        $glance->amount = request()->amount;
        $glance->creator = Auth::user()->id ?? null;
        $glance->status = request()->status ?? 1;
        $glance->slug = request()->title . '-' . rand(90000, 100000);
        $glance->save();

        return api_response(
            data: $glance,
            code: 201,
            message: 'Glance created successfully',
            errors: [],
        );
    }
}
