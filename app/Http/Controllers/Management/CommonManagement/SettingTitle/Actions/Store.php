<?php

namespace App\Http\Controllers\Management\CommonManagement\SettingTitle\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'nullable',
            'status' => 'nullable|in:0,1',

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
        $aboutUs->status = request()->input('status', 1);
        $aboutUs->creator =  Auth::user()->id;
        $aboutUs->slug = request()->title . '-' . rand(10000, 99999);
        $aboutUs->save();

        return api_response(
            data: $aboutUs,
            code: 201,
            message: 'Setting Title record created successfully',
            errors: [],
        );
    }
}
