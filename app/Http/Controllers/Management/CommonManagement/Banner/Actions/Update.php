<?php

namespace App\Http\Controllers\Management\CommonManagement\Banner\Actions;

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
            'title' => 'required',
            'subtitle' => 'nullable',
            'short_description' => 'nullable',
            'button_text' => 'nullable',
            'button_url' => 'nullable',
            'status' => 'nullable',
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
    
        $data->title =  request()->title;
        $data->sub_title =  request()->subtitle;
        $data->short_descripton =  request()->short_description;
        $data->button_text =  request()->button_text;
        $data->button_url =  request()->button_url;
        $data->status = request()->status ?? 1;

        $data->update();
        
        return $data;
    }
}
