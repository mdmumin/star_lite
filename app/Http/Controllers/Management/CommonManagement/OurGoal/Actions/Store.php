<?php

namespace App\Http\Controllers\Management\CommonManagement\OurGoal\Actions;

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
            'sub_title' => 'nullable',
            'short_description' => 'nullable',
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

        $aboutUs = new $model();
        $aboutUs->title = request()->title;
        $aboutUs->icon = request()->icon;
        $aboutUs->sub_title = request()->sub_title;
        $aboutUs->short_description = request()->short_description;
        $aboutUs->description = request()->description;
        $aboutUs->status = request()->input('status', 1);
        $aboutUs->creator =  Auth::user()->id ?? null;
        $aboutUs->slug = request()->title . '-' . rand(10000, 99999);
        $aboutUs->save();

        return api_response(
            data: $aboutUs,
            code: 201,
            message: 'About Us record created successfully',
            errors: [],
        );
    }
}
