<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog\Actions;

use Illuminate\Support\Facades\Auth;
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
            'blog_id' => ['required'],
            'blog_category_id' => ['required'],
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
    
        $data->blog_id = request()->blog_id;
        $data->blog_category_id = request()->blog_category_id;
        $data->creator = Auth::user()->id ?? null;
        $data->status = request()->status ?? 1;
        $data->update();
    
        return $data;
    }
}
