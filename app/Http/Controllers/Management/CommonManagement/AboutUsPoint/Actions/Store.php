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
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $aboutUsPoint = new $model();
        $aboutUsPoint->title = request()->title;
        $aboutUsPoint->icon = request()->icon;
        $aboutUsPoint->description = request()->description;
        $aboutUsPoint->creator = Auth::user()->id ?? null;
        $aboutUsPoint->status = request()->status ?? 1;
        $aboutUsPoint->slug = request()->title . '-' . rand(90000, 100000);
        $aboutUsPoint->save();

        return api_response(
            data: $aboutUsPoint,
            code: 201,
            message: 'About Us Point created successfully',
            errors: [],
        );
    }
}
