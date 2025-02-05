<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogTagBlog\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Store{
    
    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'blog_id' => ['required'],
            'blog_tag_id' => ['nullable'],
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
        $data->blog_id = request()->blog_id;
        $data->blog_tag_id = request()->blog_tag_id;
        $data->creator = Auth::user()->id ?? null;
        $data->slug = request()->blog_id . '-' . rand(90000, 100000);
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
