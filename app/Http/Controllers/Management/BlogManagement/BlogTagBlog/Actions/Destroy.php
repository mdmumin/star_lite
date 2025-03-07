<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogTagBlog\Actions;

class Destroy{
    
    public static function execute($model){
        $data = $model::find(request()->id);
    
        if (!$data) {
            return api_response(
                data: [],
                code: 404,
                message: 'Data not found',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $data->delete();
    
        return api_response(
            data: [],
            code: 201,
            message: 'Data deleted permanently',
            errors: [],
        );
    }

}
