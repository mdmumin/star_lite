<?php

namespace App\Http\Controllers\Management\CommonManagement\Banner\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'sub_title' => 'nullable',
            'short_descripton' => 'nullable',
            'button_text' => 'nullable',
            'button_url' => 'nullable',
            'status' => 'nullable',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $data = new $model();
        $data->title =  request()->title;
        $data->sub_title =  request()->sub_title;
        $data->short_descripton =  request()->short_descripton;
        $data->button_text =  request()->button_text;
        $data->button_url =  request()->button_url;
        $data->creator = Auth::user()->id ?? null;
        $data->slug = request()->title . '-' . rand(90000, 100000);
        $data->status = request()->status ?? 1;
        $data->save();

        return api_response(
            data: $data,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
