<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogTagBlog\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update
{

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
            'blog_tag_id' => ['nullable'],
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
        $data->blog_tag_id = request()->blog_tag_id;
        $data->creator = Auth::user()->id ?? null;
        $data->status = request()->status ?? 1;
        $data->save();

        return $data;
    }
}
