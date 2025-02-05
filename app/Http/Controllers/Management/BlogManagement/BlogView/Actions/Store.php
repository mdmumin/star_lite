<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogView\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Store{
    
    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'blog_id' => ['nullable'],
            'date' => ['nullable'],
            'total_count' => ['nullable'],
            'ip' => ['nullable'],
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
        $data->user_id = Auth::user()->id ?? null;
        $data->blog_id = request()->blog_id;
        $data->total_count = request()->total_count;
        $data->save();
    
        return api_response(
            data: $data,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
