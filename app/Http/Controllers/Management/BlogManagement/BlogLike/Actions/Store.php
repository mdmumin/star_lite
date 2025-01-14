<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogLike\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class Store{
    
    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'user_id' => ['required'],
            'blog_id' => ['nullable'],
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
        $data->user_id = request()->user_id;
        $data->blog_id = request()->blog_id;
        $data->date = Carbon::now()->toDateString();
        $data->slug = request()->date .'-'.rand(90000,100000);
        $data->save();
    
        return api_response(
            data: $data,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
