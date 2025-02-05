<?php

namespace App\Http\Controllers\Management\UserManagement\UserRole\Actions;

use Illuminate\Support\Facades\Validator;

class Store
{

    public static function execute($model)
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'role_serial' => ['required'],
            'status' => ['nullable'],
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
        $data->role_serial = request()->role_serial;
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
