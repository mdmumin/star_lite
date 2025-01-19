<?php

namespace App\Http\Controllers\Management\CommonManagement\AboutUsPoint\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'nullable',
            'icon' => 'nullable',
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

        $glance = new $model();
        $glance->title = request()->title;
        $glance->icon = request()->icon;
        $glance->description = request()->description;
        $glance->creator = Auth::user()->id;
        $glance->status = request()->status ?? 1;
        $glance->slug = request()->title . '-' . rand(90000, 100000);
        $glance->save();

        return api_response(
            data: $glance,
            code: 201,
            message: 'About Us Point created successfully',
            errors: [],
        );
    }
}
