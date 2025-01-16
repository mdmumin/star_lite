<?php

namespace App\Http\Controllers\Management\CommonManagement\OurGoal\Actions;

class SoftDelete{
    public static function execute($model){
        $data = $model::find(request()->id);
    
        if (!$data) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }
    
        $data->status = 0;
        $data->save();
    
        return api_response(
            data: $data,
            code: 201,
            message: 'data deactivated',
            errors: [],
        );
    }


}

