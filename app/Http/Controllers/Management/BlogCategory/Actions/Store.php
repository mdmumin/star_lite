<?php

namespace App\Http\Controllers\Management\BlogCategory\Actions;

use Illuminate\Support\Facades\Validator;

function Store($model)
{
    $validator = Validator::make(request()->all(), [
        'title' => ['required'],
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
    $data->title = request()->title;
    $data->save();

    return api_response(
        data: $data,
        code: 201,
        message: 'data created',
        errors: [],
    );
}
