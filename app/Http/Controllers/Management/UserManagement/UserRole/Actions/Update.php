<?php

namespace App\Http\Controllers\Management\UserManagement\UserRole\Actions;

use Illuminate\Support\Facades\Validator;


class Update{

    public static function execute($model)
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
            'role_serial' => ['required'],
            'status' => ['nullable'],
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
        $data->role_serial = request()->role_serial;
        $data->status = request()->status ?? 1;
        $data->update();

    
        return $data;
    }
}
