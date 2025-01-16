<?php

namespace App\Http\Controllers\Management\CommonManagement\SettingValue\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'setting_title_id' => 'nullable',
            'title' => 'nullable',
            'value' => 'nullable',
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
        $aboutUs->setting_title_id = request()->setting_title_id;
        $aboutUs->title = request()->title;
        $aboutUs->value = request()->value;
        $aboutUs->status = request()->input('status', 1);
        $aboutUs->creator =  Auth::user()->id;
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
