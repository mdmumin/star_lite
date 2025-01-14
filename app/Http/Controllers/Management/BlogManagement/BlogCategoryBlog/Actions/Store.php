<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog\Actions;

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
        $data->save();
    
        return api_response(
            data: $data,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
