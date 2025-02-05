<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogComment\Actions;

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
            'comment' => ['nullable'],
            'parent_id' => ['nullable'],
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
        $data->comment = request()->comment;
        $data->status = request()->status ?? 1;
        $data->update();
    
        return $data;
    }
}
