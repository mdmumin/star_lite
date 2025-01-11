<?php

namespace App\Http\Controllers\Management\BlogCategory\Actions;

use Illuminate\Support\Facades\Validator;

function Update($model)
{
    $data = $model::find(request()->id);

    if (!$data) {
        return api_response(
            data: [],
            code: 404,
            message: 'validation error',
            errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
        );
    }

    $rules = [
        'title' => ['required'],
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

    $data->title = request()->title;
    $data->save();

    return $data;
}
