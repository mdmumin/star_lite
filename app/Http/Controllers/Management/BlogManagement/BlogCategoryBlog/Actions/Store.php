<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Store{
    
    public static function execute($model)
    {
      
        $validator = Validator::make(request()->all(), [
            'blog_id' => ['required'],
            'blog_category_id' => ['required'],
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
        $data->blog_category_id = request()->blog_category_id;
        $data->creator = Auth::user()->id ?? null;
        $data->slug = request()->blog_category_id . '-' . rand(90000, 100000);
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
